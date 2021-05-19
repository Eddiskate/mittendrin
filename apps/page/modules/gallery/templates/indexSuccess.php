<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
	$(function() {
		$('.fl_gallery a').lightBox();
	});
</script>
<h3><?php echo Configuration::getOptionValue('module_gallery') ?></h3>
<?php foreach ($gallery_catalogs as $gallery_catalog): ?>
<div style="background-color: white;padding: 10px;margin-bottom: 10px;">	
		<div style="padding-left: 10px;padding-bottom: 10px;color: black;padding-left: 10px;font-weight: bold;"><?php echo $gallery_catalog->getCatalogName() ?></div>
		<div class="over">
			<?php foreach($gallery_catalog->getAvatarFileList() as $gallery): ?>
				<div class="fl_gallery">
					<?php echo link_to('<div style="width: 108px;height: 82px;background-image: url(/images/gallery/thumbs/'.$gallery->getFileName().');border: 1px solid black;"></div>', '/images/gallery/'.$gallery->getFileName(), array('class' => 'img','rel' => 'lightbox[]')) ?>			
				</div>	
			<?php endforeach; ?>
		</div>
		<p style="text-align: right;padding-right: 10px;"><?php echo link_to('Zobacz więcej', $gallery_catalog->getLink()) ?></p>
</div>
<?php endforeach; ?>
