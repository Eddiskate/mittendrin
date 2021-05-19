<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Biblioteka zdjęć</h3>
    </div>
    <div class="modal-body">
        <div class="over">
            <?php foreach ($gallerys as $gallery): ?>
                <div class="fl img-polaroid">
                    <p><?php echo image_tag('gallery/thumbs/' . $gallery->getFileName(), array('style' => 'width: 160px;height: 160px;')) ?></p>
                    <p align="center">
                        <div class="select_photo btn" data-filename="<?php echo $gallery->getFileName() ?>">użyj zdjęcia</div>
                    </p>
                </div>
            <?php endforeach; ?>
            <?php if (!isset($gallery)): ?>
                <p align="center">Brak dodanych zdjęć w tej galerii.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Zamknij</button>
    </div>

</div>
