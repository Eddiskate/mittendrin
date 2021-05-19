<div class="row">
    <div class="col-lg-12">
        <span class="icons_mittendrin section-only-line"></span>
    </div>
</div>
<div class="row" style="margin-left: 0px;">
    <div class="col-lg-2"><div class="fb-share-button" data-href="<?php echo $post->getLinkPostShowUrl() ?>" data-layout="button_count"></div></div>
    <div class="col-lg-4"><div class="g-plus" data-action="share"></div></div>
    <div class="col-lg-6"><a class="twitter-share-button" href="<?php echo $post->getLinkPostShowUrl() ?>">Tweet</a></div>
    <div class="fb-comments" data-href="http://<?php echo $_SERVER['HTTP_HOST'] ?><?php echo $post->getLinkPostShowUrl() ?>" data-numposts="5" data-colorscheme="light" data-width="100%"></div>
</div>


