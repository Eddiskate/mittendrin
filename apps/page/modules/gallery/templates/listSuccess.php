<h3><?php echo Configuration::getOptionValue('module_gallery') ?></h3>

<h2>Galeria: <?php if ($gallery_category != 'no_category'): ?><?php echo $gallery_category . ' /' ?><?php endif; ?><?php echo $gallery_category->getGalleryCatalog()->getCatalogName() ?></h2>

<div style="background-color: white;padding: 10px;margin-bottom: 10px;">	
	<div class="over">
		<?php foreach ($gallerys as $gallery): ?>
			<div class="fl_gallery">
				<?php echo link_to('<div style="width: 108px;height: 82px;background-image: url(/images/gallery/thumbs/' . $gallery->getFileName() . ');border: 1px solid black;"></div>', '/images/gallery/' . $gallery->getFileName(), array('class' => 'img', 'rel' => 'lightbox[]')) ?>			
			</div>	
		<?php endforeach; ?>
	</div>
	<p><?php echo link_to('poprzednia strona', 'gallery/index') ?></p>
</div>

<?php if (!isset($gallery)): ?>
	<p align="center">Brak dodanych zdjęć w tej galerii.</p>
<?php endif; ?>

<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
	$(function() {
		$('.fl_gallery a').lightBox();
	});
</script>
