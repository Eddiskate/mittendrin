'use strict';

function kAudio(options){
	this.options = options;

	this.player = null;
	this.playlist = {};
	this.currTrack = null;
	this.normalTurn = new Array();
	this.randomTurn = new Array();
	this.activeTurn = this.normalTurn;
	this.repeat = 'all';

	var that = this;

	soundManager.flash9Options = {
		isMovieStar: null,      // "MovieStar" MPEG4 audio mode. Null (default) = auto detect MP4, AAC etc. based on URL. true = force on, ignore URL
		usePeakData: true,     // enable left/right channel peak (level) data
		useWaveformData: true, // enable sound spectrum (raw waveform data) - WARNING: May set CPUs on fire.
		useEQData: true,       // enable sound EQ (frequency spectrum data) - WARNING: Also CPU-intensive.
		onbufferchange: null,	  // callback for "isBuffering" property change
		ondataerror: null	  // callback for waveform/eq data access error (flash playing audio in other tabs/domains)
	};

	this.player = soundManager.setup({
		url: this.options.flash_path,
		flashVersion: 9,
		useHTML5Audio: false,
		preferFlash: true,

		onready: function(){
			$(that).trigger('ready.plateEvents', this);
		}
	});
}

kAudio.prototype.uiTime = function(sec){
	if(isNaN(sec) || sec === Infinity || sec === false){
		return '∞';
	}else{
		sec = Math.floor(sec/1000);
		var mod = Math.floor(sec % 60);
		if(mod < 10){mod = '0' + mod;}
		return Math.floor(sec/60) + ':' + mod;
	}
};

kAudio.prototype.setRandom = function(val){
	this.activeTurn = val ? this.randomTurn : this.normalTurn;
	$(this).trigger('randomChange.plateEvents', val);
};

kAudio.prototype.setRepeat = function(val){
	this.repeat = val;
	$(this).trigger('repeatChange.plateEvents', val);
};

kAudio.prototype._go2Track = function(vector){
	if(this.currTrack){
		var num = $.inArray(this.currTrack.id, this.activeTurn)+(vector || 1);
		if(num > this.activeTurn.length-1){
			num = 0;
		}else if(num < 0){
			num = this.activeTurn.length-1;
		}

		this.selectTrack(this.activeTurn[num]);
	}else{
		this.selectTrack(this.activeTurn[0]);
	}
};

kAudio.prototype.nextTrack = function(){
	this._go2Track(+1);
};

kAudio.prototype.prevTrack = function(){
	this._go2Track(-1);
};

kAudio.prototype.addTrack = function(trackInfo){
	var that = this;

	if(0 === trackInfo.src.indexOf('folder:')){
		$.ajax({
			dataType: 'jsonp',
			data: {
				method: 'parseFolder',
				api_key: that.options.kuzenko_API_key,
				url: trackInfo.src.replace('folder:', '')
			},
			context: this,
			url: encodeURI(that.options.kuzenko_API_url),
			success: function(res){
				if(5 == res.status){
					$.each(res.tracks, function(i, tInfo){
						that.addTrack(tInfo);
					});
				}
			}
		});
	}else if((-1 !== trackInfo.src.indexOf('.pls') || -1 !== trackInfo.src.indexOf('.m3u'))){
		$.ajax({
			dataType: 'jsonp',
			data: {
				method: 'parsePlaylist',
				api_key: that.options.kuzenko_API_key,
				url: trackInfo.src
			},
			context: this,
			url: encodeURI(that.options.kuzenko_API_url),
			success: function(res){
				if(5 == res.status){
					$.each(res.tracks, function(i, tInfo){
						that.addTrack(tInfo);
					});
				}
			}
		});
	}else{
		var id = 'kid'+Date.now();

		this.playlist[id] = this.player.createSound({
			id: id,
			url: trackInfo.src,
			autoLoad: false,
			autoPlay: false,
			whileplaying: function(){
				if(!this.duration && this.position > this.upPosition){
					this.upPosition += 4000;

					$.ajax({
						dataType: 'jsonp',
						data: {
							method: 'nowPlaying',
							api_key: that.options.kuzenko_API_key,
							url: this.info.src,
							type: this.info.type
						},
						context: this,
						url: encodeURI(that.options.kuzenko_API_url),
						success: function(res){
							if(5 == res.status){
								var oldTitle = this.info.title;
								var oldArtist = this.info.artist;

								this.info.title = res.title;
								this.info.artist = res.artist;
								this.info.type = res.type;

								if(oldTitle != this.info.title || oldArtist != this.info.artist){
									this.loadCover();
								}

								$(that).trigger('loadStreamID3.plateEvents', this);
							}
						}
					});
				}

				$(that).trigger('playing.plateEvents', this);
			},
			whileloading: function(){
				$(that).trigger('buffering.plateEvents', this);
			},
			onfinish: function(){
				if(that.repeat == 'one'){
					that.play();

				}else if(that.normalTurn.length > 1){
					that.nextTrack();
					that.play();
				}else{
					that.play();
					that.stop();
				}

				$(that).trigger('finish.plateEvents', this);
			},
			onpause: function(){
				$(that).trigger('pause.plateEvents', this);
			},
			onplay: function(){
				this.upPosition = -1;
				$(that).trigger('start.plateEvents', this);
			},
			onresume: function(){
				this.upPosition = -1;
				$(that).trigger('start.plateEvents', this);
			},
			onstop: function(){
				$(that).trigger('stop.plateEvents', this);
			}
		});

		this.playlist[id].info = trackInfo;

		this.playlist[id].loadID3 = function(){
			$.ajax({
				dataType: 'jsonp',
				data: {
					method: 'getID3',
					api_key: that.options.kuzenko_API_key,
					url: this.info.src
				},
				context: this,
				url: encodeURI(that.options.kuzenko_API_url),
				success: function(res){
					if(5 == res.status){
						this.info.title = this.info.title || res.title;
						this.info.artist = this.info.artist || res.artist;
					}
				},
				complete: function(){
					this.loadedID3 = true;
					if(!this.info.cover && this.info.title && this.info.artist){
						this.loadCover();
					}
					$(that).trigger('loadID3.plateEvents', this);
				}
			});
		};

		this.playlist[id].loadCover = function(){
			$.ajax({
				dataType: 'jsonp',
				data: {
					method: 'track.getInfo',
					api_key: that.options.lastFM_API_key,
					artist: this.info.artist,
					track: this.info.title,
					format: 'json'
				},
				context: this,
				url: encodeURI(that.options.lastFM_API_url),
				success: function(res){
					if(res.track && res.track.album && res.track.album.image){
						this.info.cover = res.track.album.image[3]['#text'];
					}
				},
				complete: function(){
					this.loadedCover = true;
					$(that).trigger('loadCover.plateEvents', this);
				}
			});
		};

		if(!trackInfo.title || !trackInfo.artist){
			this.playlist[id].loadID3();
		}else if(!trackInfo.cover){
			this.playlist[id].loadCover();
		}

		this.normalTurn.push(id);
		this.randomTurn.push(id);

		var i = this.randomTurn.length, j, t;
		while(i){
			j = Math.floor( ( i-- ) * Math.random() );
			t = this.randomTurn[i];
			this.randomTurn[i] = this.randomTurn[j];
			this.randomTurn[j] = t;
		}

		$(this).trigger('addTrack.plateEvents', this.playlist[id]);
	}
};

kAudio.prototype.selectTrack = function(kid){
	this.currTrack = this.playlist[kid];
	$(this).trigger('selTrack.plateEvents', this.playlist[kid]);
	this.currTrack.setVolume(this.player.defaultOptions.volume);
	return this.currTrack;
};

kAudio.prototype.play = function(){
	if(this.currTrack.paused){
		this.currTrack.resume();
	}else{
		this.stopAll();
		this.currTrack.play();
	}
};

kAudio.prototype.pause = function(){
	//
	this.currTrack.pause();
};

kAudio.prototype.stop = function(){
	this.currTrack.pause();
	this.currTrack.stop();
	this.stopAll();
	this.currTrack.unload();
};

kAudio.prototype.stopAll = function(){
	var self = this;
	$.each(this.playlist, function(){
		this.stop();
	});
};

kAudio.prototype.volume = function(val){
	if('undefined' === typeof(val)){
		return this.player.defaultOptions.volume;
	}else{
		this.player.defaultOptions.volume = val;
		if(this.currTrack){
			this.currTrack.setVolume(this.player.defaultOptions.volume);
		}
		$(this).trigger('volumeChange.plateEvents', this.player.defaultOptions.volume);
	}
};




(function($){

	$.expr[":"].Contains = jQuery.expr.createPseudo(function(arg) {
		return function( elem ) {
			return jQuery(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
		};
	});

	var _sites = {
			facebook: {
				url: 'https://www.facebook.com/sharer/sharer.php?s=100&p[title]={{title}}&p[summary]={{description}}&p[url]={{url}}&p[images][0]={{media}}',
				popup: {
					width: 626,
					height: 436
				}
			},
			twitter: {
				url: 'https://twitter.com/share?url={{url}}&via={{via}}&text={{description}}',
				popup: {
					width: 685,
					height: 500
				}
			},
			googleplus: {
				url: 'https://plus.google.com/share?url={{url}}',
				popup: {
					width: 600,
					height: 600
				}
			}
		},

		_popup = function (site, url) {
			// center window
			var left = (window.innerWidth/2) - (site.popup.width/2),
				top = (window.innerHeight/2) - (site.popup.height/2);

			return window.open(url, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + site.popup.width + ', height=' + site.popup.height + ', top=' + top + ', left=' + left);
		},

		_linkFix = function (site, link) {
			// replace template url
			var url = site.url.replace(/{{url}}/g, encodeURIComponent(link.url))
				.replace(/{{title}}/g, encodeURIComponent(link.title))
				.replace(/{{description}}/g, encodeURIComponent(link.description))
				.replace(/{{media}}/g, encodeURIComponent(link.media))
				.replace(/{{via}}/g, encodeURIComponent(link.via));

			return url;
		};

	var methods = {
		init: function(playlist, options){
			options = $.extend({
				//load options
				flash_path: '/swf/',
				kuzenko_API_url: '/api/index.php',
				kuzenko_API_key: '',
				lastFM_API_url: 'http://ws.audioscrobbler.com/2.0/',
				lastFM_API_key: '645753db26e26465663a7be06260b60c',

				//visual options
				width: '100%',
				playlistHeight: 200,
				skin: false,
				autoResponsive: true,

				components: ['cover', 'vinyl', 'trackName', 'volume', 'prev', 'next', 'play', 'pause', 'progress', 'stop', 'random', 'repeat', 'share', 'playlist', 'search', 'currentPosition', 'duration', 'mute', 'buy', 'download'],

				//start options
				autostart: false,
				volume: 50,
				random: true,

				//content options
				unknownTitleText: 'Unknown Title',
				unknownArtistText: 'Unknown Artist',

				postTemplater: function(tpl){
					return tpl;
				},

			}, options);

			return this.each(function(){
				var $this = $(this);
				var data = $this.data('plate');

				if(!data){
					if($.isArray(options.components)){
						var tmpComponents = {};
						for(var i = 0; i < options.components.length; i++){
							tmpComponents[options.components[i]] = true;
						}
						options.components = tmpComponents;
					}


					var player = new kAudio(options);

					//find images folder
					$this.html('<div class="plateImgFolderTest">');
					//options.imagesFolder = /^url\((['"]?)(.*)\1\)$/.exec($this.find('.plateImgFolderTest').css('background-image').split('albumGlass.png').join(''));
					//options.imagesFolder = options.imagesFolder ? options.imagesFolder[2] : '';
					//options.imagesFolder = options.imagesFolder ? options.imagesFolder[2] : '';


					//gen main template
					var tpl = [];
					tpl.push('<div class="layer">');
					tpl.push('<div class="clr h20"></div>');
					tpl.push('<div class="lamps"></div>');
					tpl.push('<div class="ap-lize">');
					tpl.push('<div class="aqua-lize one"><div style="height:5.88%;" id="left_peack" class="liz-abs"></div></div>');
					tpl.push('<div class="aqua-lize two"><div style="height:5.88%;" id="right_peack" class="liz-abs-2"></div></div>');
					tpl.push('</div>');
					tpl.push('<div class="switch">');
					tpl.push('<div id="placeholderdiv"></div>');
					tpl.push('</div>');
					tpl.push('<div class="buy">');
					tpl.push('<a href="'+options.hh_fb_link+'" target="_blank" class="app-store_android"></a>');
					tpl.push('<a href="'+options.hh_app_store_link+'" target="_blank" class="app-store_apple"></a>');
					tpl.push('<a href="'+options.hh_play_market_link+'" target="_blank" class="facebook"></a>');
					tpl.push('</div>');
					tpl.push('<div class="control">');
					tpl.push('<div class="play plate-button"></div>');
					tpl.push('<div class="stop plate-button"></div>');
					tpl.push('<div class="prev plate-button "></div>');
					tpl.push('<div class="next plate-button"></div>');
					tpl.push('</div>');


					tpl.push('<div class="album">');
					tpl.push('<img class="cover" src="img/52.jpg" alt="">');
					tpl.push('</div>');
					tpl.push('<div class="volume"><div class="mute"></div></div>');
					tpl.push('<div class="vl_slider"></div>');
					tpl.push('<div class="info">');
					tpl.push('<div class="title oneline"></div>');
					tpl.push('<div class="artist oneline"></div>');
					tpl.push('</div>');
					tpl.push('<div class="control">');
					tpl.push('<div class="clr"></div>');
					tpl.push('</div>');
					tpl.push('<div class="round"></div>');
					tpl.push('<div class="round2"></div>');
					tpl.push('</div>');

					tpl.push('<div class="logo"></div>');
					tpl.push('<div class="logo1"></div>');
					tpl.push('<a href="http://www.kuzenko.net" title="KUZENKO.NET" target="_blank" class="kuzenko"></a>');

					/*

					 if(options.components.cover){
					 tpl.push('<div class="album">');
					 if(options.components.vinyl){
					 tpl.push('<img class="record" alt="" src="'+options.imagesFolder+'vinyl.png">');
					 tpl.push('<img class="record_light dj" alt="" src="'+options.imagesFolder+'vinylLight.png">');
					 }
					 tpl.push('<img class="cover" src="'+options.imagesFolder+'coverDefault.png" alt="">');
					 tpl.push('<div class="glass"></div>');
					 tpl.push('</div>');
					 tpl.push('<div class="clr"></div>');
					 }
					 if(options.components.volume){
					 tpl.push('<div class="volume">');
					 if(options.components.mute){tpl.push('<div class="mute">\uE809</div>');}
					 tpl.push('<div class="vl_slider"></div>');
					 tpl.push('</div>');
					 }
					 if(options.components.trackName){
					 tpl.push('<div class="info">');
					 tpl.push('<div class="title oneline">'+options.unknownTitleText+'</div>');
					 tpl.push('<div class="artist oneline">'+options.unknownArtistText+'</div>');
					 tpl.push('</div>');
					 }
					 tpl.push('<div class="clr"></div>');
					 if(options.components.progress){
					 tpl.push('<div class="progress">');
					 if(options.components.currentPosition){tpl.push('<div class="time curTime"></div>');}
					 if(options.components.duration){tpl.push('<div class="time allTime"></div>');}
					 tpl.push('</div>');
					 }
					 tpl.push('<div class="clr"></div>');
					 tpl.push('<div class="control">');
					 if(options.components.prev){tpl.push('<button class="plate-button prev"><span>\uE805</span></button>');}
					 if(options.components.play){tpl.push('<button class="plate-button play"><span>\uE801</span></button>');}
					 if(options.components.pause){tpl.push('<button class="plate-button pause"><span>\uE803</span></button>');}
					 if(options.components.stop){tpl.push('<button class="plate-button stop"><span>\uE802</span></button>');}
					 if(options.components.next){tpl.push('<button class="plate-button next"><span>\uE804</span></button>');}
					 if(options.components.random){tpl.push('<button class="plate-button random"><span>\uE806</span></button>');}
					 if(options.components.repeat){tpl.push('<button class="plate-button repeat"><span>\uE80B</span></button>');}
					 if(options.components.buy){tpl.push('<button class="plate-button buy"><span>\uE800</span></button>');}
					 if(options.components.download){tpl.push('<button class="plate-button download"><span>\uE810</span></button>');}
					 tpl.push('<div class="clr"></div>');
					 tpl.push('</div>');
					 tpl.push('<div class="clr"></div>');
					 if(options.components.playlist){tpl.push('<div class="playlist_wrap"><div class="playlist"><ul></ul></div></div>');}
					 if(options.components.search){tpl.push('<div class="search_wrap" ><input type="text" class="search" value="" placeholder="Find track..."></div>');}

					 tpl = options.postTemplater(tpl, $this, options);*/

					$this.html(tpl.join(''));


					$this
						.addClass('plate')
						.addClass(options.skin)
					;

					$this.width(options.width);
					$this.find('.playlist').height(options.playlistHeight);

					$this.find('.curTime').html(player.uiTime(0));
					$this.find('.allTime').html(player.uiTime(Infinity));
					$this.find('.progress').attr('disabled', 'disabled');

					if(options.autoResponsive){
						$(window).on('resize.plateEvents', function(){
							$this.css({'max-width': $(window).width()});
							$this.find('.playlist').css({'max-height': $(window).height()-($this.height()-$this.find('.playlist').height())});
						}).trigger('resize.plateEvents');
					}


					//init & confiqure UI libs
					if(options.components.playlist){
						if('undefined' !== typeof(IScroll)){
							$this.playlistScroll = new IScroll($this.find('.playlist')[0], {mouseWheel: true, tap: true});
						}else{
							$this.find('.playlist').css({'overflow-y': 'auto'});
						}
					}



					if($().noUiSlider){
						if(options.components.volume){
							$this.find('.vl_slider')
								.noUiSlider({
									start: 0,
									connect: 'lower',
									orientation: 'vertical',
									direction: 'rtl',
									range: {'min': 0, 'max': 100}
								})
								.on('slide', function(e){
									var $handler = $(this).find('.noUi-handle');
									//$handler.css({'margin-left':-($(this).val()*$handler.width()/100)});
									if(player.volume() != $(this).val()){
										player.volume($(this).val());
									}

									var $mute = $this.find('.volume .mute');
									$mute.removeClass('on volume100');

									if(player.volume() == 0){
										$mute.addClass('on');
									}
								})
								.on('set', function(e){
									$(this).trigger('slide');
								})
							;
						}
					}


					$this
						.on('tap.plateEvents', '.playlist .track', function(e){
							player.selectTrack($(this).attr('rel'));
							player.play();
						})
						.on('click.plateEvents', '.volume .mute', function(e){
							player.volume(player.volume() == 0 ? options.volume : 0);
						})
						.on('click.plateEvents', '.playlist .fb', function(e){
							var id = $(this).closest('.track').attr('rel');
							var track = player.playlist[id];

							var site = _sites['facebook'] || null;

							var link = {
								url: location.href,
								media: track.info.cover,
								via: 'Plate III',
								description: track.info.artist+' - '+track.info.title,
							};

							var url = _linkFix(site, link);

							_popup(site, url);
						})
						.on('click.plateEvents', '.playlist .tw', function(e){
							var id = $(this).closest('.track').attr('rel');
							var track = player.playlist[id];

							var site = _sites['twitter'] || null;

							var link = {
								url: location.href,
								media: track.info.cover,
								via: 'Plate III',
								description: track.info.artist+' - '+track.info.title,
							};

							var url = _linkFix(site, link);

							_popup(site, url);
						})
						.on('click.plateEvents', '.playlist .gp', function(e){
							var id = $(this).closest('.track').attr('rel');
							var track = player.playlist[id];

							var site = _sites['googleplus'] || null;

							var link = {
								url: location.href,
								media: track.info.cover,
								via: 'Plate III',
								description: track.info.artist+' - '+track.info.title,
							};

							var url = _linkFix(site, link);

							_popup(site, url);
						})
						.on('click.plateEvents', '.control .pause', function(e){
							player.pause();
						})
						.on('click.plateEvents', '.control .play', function(e){
							player.play();
						})
						.on('click.plateEvents', '.control .next', function(e){
							player.nextTrack();
							player.play();
						})
						.on('click.plateEvents', '.control .prev', function(e){
							player.prevTrack();
							player.play();
						})
						.on('click.plateEvents', '.control .stop', function(e){
							player.stop();
						})
						.on('click.plateEvents', '.control .download', function(e){
							location.href = player.currTrack.info.downloadLink;
						})
						.on('click.plateEvents', '.control .buy', function(e){
							location.href = player.currTrack.info.buyLink;
						})
						.on('click.plateEvents', '.control .random', function(e){
							if(player.normalTurn == player.activeTurn){
								player.setRandom(true);
							}else{
								player.setRandom(false);
							}
						})
						.on('click.plateEvents', '.control .repeat', function(e){
							if(player.repeat == 'one'){
								player.setRepeat('all');
							}else{
								player.setRepeat('one');
							}
						})
						.on('keyup.plateEvents', '.search', function(){

							if($(this).val() != ''){
								$this.find('.playlist .track').hide();
								$this.find('.playlist .track:Contains("'+$(this).val()+'")').show();
							}else{
								$this.find('.playlist .track').show();
							}

							setTimeout(function(){
								$this.playlistScroll.refresh();
							}, 1);

							/*	$s_cont.find('.region').each(function(i, el){
							 if($(this).find('a:visible').size() == 0){
							 $(this).hide();
							 }
							 });

							 $s_cont.masonry('reload');*/
						})
					;

					$this.setCover = function(newImage){
						var $cover = $this.find('.album .cover');
						var $album = $this.find('.album');

						if($cover.attr('src') == newImage){return false;}

						var $clone = $cover.clone().addClass('clone');
						$cover.after($clone);
						$clone.animate({
							'opacity': 0
						}, 700, function(){
							$(this).remove();
						});

						$cover.attr('src', newImage);


						var oldWidth = $album.width();
						$album.animate({
							'width': $cover.width() +12
						}, 700, function(){
							$(this).animate({
								'width':oldWidth
							}, 500, function(){
								$this.find('.clone').remove();
							});
						});
					};

					//events from audio objects
					$(player)
						.on('ready.plateEvents', function(e, player){
							var that = this;
							//add tracks from playlist
							$.each(playlist, function(i, trackInfo){
								that.addTrack(trackInfo);
							});

							this.setRandom(options.random);
							this.volume(options.volume);
						})
						.on('volumeChange.plateEvents', function(e, volume){
							//
							$this.find('.vl_slider').val(volume, {set: true});
						})
						.on('randomChange.plateEvents', function(e, isRandom){
							if(isRandom){
								$this.find('.control .random').addClass('on');
							}else{
								$this.find('.control .random').removeClass('on');
							}
						})
						.on('repeatChange.plateEvents', function(e, repeatType){
							if(repeatType == 'one'){
								$this.find('.control .repeat').addClass('on');
							}else{
								$this.find('.control .repeat').removeClass('on');
							}
						})
						.on('addTrack.plateEvents', function(e, newTrack){
							//draw track on playlist
							if(options.components.playlist){
								var tpl = [];
								tpl.push('<li class="track" rel="'+newTrack.id+'">');
								tpl.push('<button class="plate-button play"><span>\uE801</span></button>');
								tpl.push('<img class="cover" alt="" src="'+(newTrack.info.cover || options.imagesFolder+'coverDefaultPlaylist.png')+'">');
								tpl.push('<div class="title oneline">'+(newTrack.info.title || options.unknownTitleText)+'</div>');
								tpl.push('<div class="artist oneline">'+(newTrack.info.artist || options.unknownArtistText)+'</div>');
								if(options.components.share){
									tpl.push('<a class="fb" href="#"><span>\uE80C</span></a>');
									tpl.push('<a class="tw" href="#"><span>\uE80D</span></a>');
									tpl.push('<a class="gp" href="#"><span>\uE80E</span></a>');
								}
								tpl.push('<div class="clr"></div>');
								tpl.push('</li>');
								$this.find('.playlist ul').append(tpl.join(''));

								if('undefined' !== typeof(IScroll)){
									setTimeout(function(){
										$this.playlistScroll.refresh();
									}, 1);
								}
							}

							//set first active track and play it
							if(!this.currTrack){
								this.nextTrack();
								if(options.autostart){
									this.play();
								}
							}
						})
						.on('selTrack.plateEvents', function(e, track){
							$this.find('#left_peack').css('height', '5.88%');
							$this.find('#right_peack').css('height', '5.88%');
							if(options.components.playlist){
								$this.find('.playlist .track').removeClass('active');
								$this.find('.playlist .track[rel="'+track.id+'"]').addClass('active');
							}

							$this.find('.info .title').html(track.info.title || options.unknownTitleText);
							$this.find('.info .artist').html(track.info.artist || options.unknownArtistText);

							if(track.info.downloadLink){
								$this.find('.control .download').show();
							}else{
								$this.find('.control .download').hide();
							}

							if(track.info.buyLink){
								$this.find('.control .buy').show();
							}else{
								$this.find('.control .buy').hide();
							}

							$this.setCover(track.info.cover || options.imagesFolder+'coverDefault.png');

							//$this.find('.album .cover').attr('src', (track.info.cover || options.imagesFolder+'coverDefault.png'));
							$this.find('.album .record').css('background-image', 'url('+(track.info.cover || options.imagesFolder+'coverDefault.png')+')');

							//$this.find('.curTime').html('loading...');
							//$this.find('.allTime').html(player.uiTime(Infinity));
							$this.find('.progress').val(0);

							if(options.components.playlist){
								if('undefined' !== typeof(IScroll)){
									var scrollIndex = $this.find('.playlist .track[rel="'+track.id+'"]').index('.track');
									var $toElement = $this.find('.playlist .track:eq('+(scrollIndex > 0 ? scrollIndex-1 : 0)+')');
									if($toElement.size() == 0 || ($this.find('.playlist').innerHeight() < ($this.find('.playlist .track:first').outerHeight()*2))){
										$toElement = $this.find('.playlist .track[rel="'+track.id+'"]');
									}

									$this.playlistScroll.scrollToElement($toElement[0], 600, null);
								}
							}
						})
						.on('loadID3.plateEvents', function(e, track){
							$this.find('.playlist .track[rel="'+track.id+'"] .title').html(track.info.title || options.unknownTitleText);
							$this.find('.playlist .track[rel="'+track.id+'"] .artist').html(track.info.artist || options.unknownArtistText);
							if(track.id == this.currTrack.id){
								$this.find('.info .title').html(track.info.title || options.unknownTitleText);
								$this.find('.info .artist').html(track.info.artist || options.unknownArtistText);
							}
						})
						.on('loadStreamID3.plateEvents', function(e, track){
							$this.find('.playlist .track[rel="'+track.id+'"] .title').html(track.info.title || options.unknownTitleText);
							$this.find('.playlist .track[rel="'+track.id+'"] .artist').html(track.info.artist || options.unknownArtistText);
							if(track.id == this.currTrack.id){
								$this.find('.info .title').html(track.info.title || options.unknownTitleText);
								$this.find('.info .artist').html(track.info.artist || options.unknownArtistText);
							}
						})
						.on('loadCover.plateEvents', function(e, track){
							$this.find('.playlist .track[rel="'+track.id+'"] .cover').attr('src', (track.info.cover || options.imagesFolder+'coverDefaultPlaylist.png'));
							if(track.id == this.currTrack.id){
								$this.setCover(track.info.cover || options.imagesFolder+'coverDefault.png');

								$this.find('.album .record').css('background-image', 'url('+(track.info.cover || options.imagesFolder+'coverDefault.png')+')');
							}
						})
						.on('playing.plateEvents', function(e, track){
							var randPeak = Math.random();

							if(player.volume()){
								$this.find('#left_peack').css('height', Math.round(track.peakData.left*100/5.88)*5.88+'%');
								$this.find('#right_peack').css('height', Math.round(track.peakData.right*100/5.88)*5.88+'%');
							}else{
								$this.find('#left_peack').css('height', '5.88%');
								$this.find('#right_peack').css('height', '5.88%');
							}

							$this.find('.curTime').html(player.uiTime(track.position));
							$this.find('.allTime').html(player.uiTime(track.duration || Infinity));
							if(track.duration){
								$this.find('.progress').val(track.position*1000/track.duration).removeAttr('disabled');
							}else{
								$this.find('.progress').attr('disabled', 'disabled');
							}
							if($().rotate){
								$this.find('.round2').rotate({animateTo:(track.position/1000*360/(78/60))});
							}
						})
						.on('buffering.plateEvents', function(e, track){
							//
						})
						.on('start.plateEvents', function(e, track){
							$this.find('.control .pause').show();
							$this.find('.control .stop').show();
							$this.find('.control .play').hide();
							$this.find('.lamps').addClass('on');
						})
						.on('pause.plateEvents', function(e, track){
							$this.find('.control .pause').hide();
							$this.find('.control .stop').hide();
							$this.find('.control .play').show();
							$this.find('.lamps').removeClass('on');
							$this.find('#left_peack').css('height', '5.88%');
							$this.find('#right_peack').css('height', '5.88%');
						})
						.on('stop.plateEvents', function(e, track){
							$this.find('.curTime').html(player.uiTime(0));
							$this.find('.allTime').html(player.uiTime(Infinity));
							$this.find('.lamps').removeClass('on');
							$this.find('.progress').val(0).attr('disabled', 'disabled');
							$this.find('#left_peack').css('height', '5.88%');
							$this.find('#right_peack').css('height', '5.88%');
						})
						.on('finish.plateEvents', function(e, track){
							//
						})
						.on('updateVolume.plateEvents', function(e, value){//TODO if is plugin
							$this.find('.vl_slider').val(value);
						})

					;

					$(this).data('plate', {
						target: $this,
						player: player
					});
				}
			});
		},
		play: function(){
			return this.each(function(){
				$(this).data('plate').player.play();
			});
		},
		pause: function(){
			return this.each(function(){
				$(this).data('plate').player.pause();
			});
		},
		stop: function(){
			return this.each(function(){
				$(this).data('plate').player.stop();
			});
		},
		next: function(){
			return this.each(function(){
				$(this).data('plate').player.nextTrack();
				$(this).data('plate').player.play();
			});
		},
		prev: function(){
			return this.each(function(){
				$(this).data('plate').player.prevTrack();
				$(this).data('plate').player.play();
			});
		},
		setVolume: function(val){
			return this.each(function(){
				$(this).data('plate').player.volume(val);
			});
		},
		getVolume: function(){
			return $(this[0]).data('plate').player.volume();
		},
		setRandom: function(val){
			return this.each(function(){
				$(this).data('plate').player.setRandom(val);
			});
		},
		getRandom: function(){
			var player = $(this[0]).data('plate').player;
			return (player.randomTurn == player.activeTurn);
		},
		setRepeat: function(val){
			if(val != 'one' && val != 'all'){
				val = 'no';
			}
			return this.each(function(){
				$(this).data('plate').player.setRepeat(val);
			});
		},
		getRepeat: function(){
			var player = $(this[0]).data('plate').player;
			if(player.repeat == 'all'){
				return 'all';
			}else if(player.repeat == 'one'){
				return 'one';
			}else{
				return 'no';
			}
		},
		destroy: function(){
			return this.each(function(){
				var $this = $(this);
				var data = $this.data('plate');
				$(data.player).off('.plateEvents');
				$this.removeData('plate');
			});
		}
	};

	$.fn.plate = function(method){
		if(methods[method]){
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		}else if(typeof method === 'object' || ! method){
			return methods.init.apply(this, arguments);
		}else{
			$.error('Method “'+ method+'” not found in Plate player.');
		}
	};

})(jQuery);