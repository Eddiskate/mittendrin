<div style="width: 100%;overflow: hidden;">
    <?php echo form_tag('iframe/gallery') ?>
    <select name="idgallery_category">
        <?php foreach($gallery_catalogs as $gallery_catalog): ?>
            <optgroup label="<?php echo $gallery_catalog->getCatalogName() ?>">wszystko</optgroup>
            <?php foreach($gallery_catalog->getCategorys() as $gallery_category): ?>
                <option value="<?php echo $gallery_category->getIdgalleryCategory() ?>" <?php if($gallery_category->getIdgalleryCategory() == $sf_user->getAttribute('tmp_gallery_select')): ?>selected="selected"<?php endif; ?>><?php echo $gallery_category->getCatalogNameWithIdpage() ?></option>                            
            <?php endforeach; ?>
        <?php endforeach; ?>
    </select>
    <input type="submit" name="submit" value="Wybierz galerie">
</form>    
<p style="font-size: 12px;">Galeria: <?php echo $gallery_category_select->getGalleryCatalog()->getCatalogName().' / '.$gallery_category_select->getCatalogNameWithIdpage() ?></p>
<?php foreach ($gallerys as $gallery): ?>
    <div style="float: left;width: 85px;height: 100px;margin-right: 4px;margin-bottom: 4px;border:1px solid black;font-size: 11px;text-align: center;"><?php echo image_tag('gallery/' . $gallery->getFileName(), array('width' => 85, 'height' => 85)) ?>
        <?php echo $gallery->getSizePx() ?>
    </div>
<?php endforeach; ?>
</div>
