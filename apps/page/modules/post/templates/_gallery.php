<?php if (count($gallery_array) > 0): ?>
    <section class="container-gallery">
        <h2>GALERIA ZDJĘĆ:</h2>
        <ul class="gallery-post">
            <?php foreach ($gallery_array as $lp => $gallery): ?>
                <a class="col-md-2 col-xs-4"
                   href="<?php echo url_for('@post_show_gallery?idpost=' . $post->getIdpost() . '&title=' . Configuration::getStringAndReplace($post->getLangTitle())) ?>?id=<?php echo($lp + 1) ?>">
                    <img class="img-responsive" src="/images/duch.png"
                         style="background-image: url('/images/gallery/<?php echo $gallery['file_name'] ?>')">
                </a>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>