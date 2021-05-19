<?php if ($sf_params->get('module') == 'home' && $sf_params->get('action') == 'index'): ?>
    <div class="container container-slideshow padding-lr-none hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 padding-lr-none">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php foreach ($slideshows as $lp => $slideshow): ?>
                                <li data-target="#carousel-example-generic" data-slide-to="<?php echo $lp ?>" class="<?php echo $slideshow['active'] ?>"></li>
                            <?php endforeach; ?>
                        </ol>

                        <div class="carousel-inner" role="listbox">
                            <?php foreach ($slideshows as $slideshow): ?>
                                <div class="item <?php echo $slideshow['active'] ?>">
                                    <a href="<?php echo $slideshow['body_link'] ? $slideshow['body_link'] : '#' ?>">
                                    <img src="/images/slideshow/<?php echo $slideshow['file_name'] ?>">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon slideshow-btn-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon slideshow-btn-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
<?php endif; ?>