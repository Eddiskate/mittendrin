<?php if ($gallery_category): ?>
    <h3>
        Galeria: <?php if ($gallery_category->getCategoryName() != 'no_category'): ?><?php echo $gallery_category->getCategoryName() ?> / <?php endif; ?><?php echo $gallery_category->getGalleryCatalog()->getCatalogName() ?>
        , dodaj nowe zdjęcia.</h3>
    <p><?php echo link_to('poprzednia strona', 'gallery/list?idgallery_category=' . $sf_params->get('idgallery_category')) ?></p>
<?php endif; ?>
<?php if ($post): ?>
    <h3>Galeria: <?php echo $post->getTitle() ?></h3>
    <p>Dodaj nowe zdjęcia.</p>
    <p><?php echo link_to('Przejdź do strony artykułu', 'post/edit?idpost=' . $sf_params->get('idpost'), array('class' => 'btn btn-mini')) ?></p>
<?php endif; ?>

<form action="/admin.php/ajax/ajaxUpload" id="myForm" name="frmupload" method="post" enctype="multipart/form-data">
    <input type="file" id="upload_file" name="upload_file[]" multiple="multiple" accept="image/*"/>
    <input type="submit" name='submit_image' value="wyślij na serwer" class="btn btn-success btn-mini"
           onclick='upload_image();'/>
    <input type="hidden" value="<?php echo $sf_params->get('idgallery_category') ?>" name="idgallery_category">
    <input type="hidden" value="<?php echo $sf_params->get('idpost') ?>" name="idpost">
</form>
<div class='progress' id="progress_div">
    <div class='bar' id='bar'></div>
    <div class='percent' id='percent'>0%</div>
</div>
<div id='output_image'>




