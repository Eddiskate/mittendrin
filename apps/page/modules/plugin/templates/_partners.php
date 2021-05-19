<div class="container container-partners">
    <div class="row mb-50 mt-50">
        <div class="col-md-12">
            <h3 class="text-center mt-50 mb-50"><?php echo LANG_SECTION_HEADER_TITLE_PARTNERS ?></h3>
            <ul class="logo">
                <?php foreach ($gallerys as $gallery): ?>
                    <li class="col-md-4">
                        <?php if ($gallery['redirect_to_url'] != ''): ?>
                            <a href="<?php echo $gallery['redirect_to_url'] ?>" target="_blank"><img src="/images/gallery/<?php echo $gallery['file_name'] ?>"></a>
                        <?php else: ?>
                            <img src="/images/gallery/<?php echo $gallery['file_name'] ?>">
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
