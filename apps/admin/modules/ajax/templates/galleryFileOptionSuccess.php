<div class="row">
    <div class="span3" style="width: 30%;float: left;">
        <img src="/images/gallery/<?php echo $gallery['file_name'] ?>"
             class="img-responsive img-rounded" style="height: 100px;">
    </div>
    <div class="span8" style="width: 59%;float: right;">
        <form id="form-gallery-option">
            <input name="form[idgallery]" value="<?php echo $gallery['idgallery'] ?>" type="hidden">
            <label class="checkbox">
                <input name="form[default_gallery]" value="1" type="checkbox" id="jq-gallery-file-option-default-btn" <?php if($gallery['default_gallery'] == 1): ?>checked="checked"<?php endif; ?>> ustaw
                jako miniaturkę
            </label>
            <label class="checkbox" <?php if($gallery['default_gallery_off'] == 0 && $gallery['default_gallery'] == 0): ?>style="display: none;"<?php endif; ?> id="jq-gallery-file-option-default-gallery-off-label">
                <input name="form[default_gallery_off]" value="1" type="checkbox" <?php if($gallery['default_gallery_off'] == 1): ?>checked="checked"<?php endif; ?>> pokaż miniaturkę w galerii
            </label>
        </form>
    </div>
</div>