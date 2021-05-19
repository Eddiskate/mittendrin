<section class="ls columns_padding_25 download-file">
    <div class="container">
        <div class="row vertical-tabs">
            <div class="col-sm-5">
                <!-- Nav tabs -->
                <ul class="nav" role="tablist">
                    <?php foreach ($downloads as $download): ?>
                        <li class="">
                            <a href="#vertical-tab<?php echo $download['iddownload'] ?>" role="tab"
                               data-toggle="tab"
                               aria-expanded="false"><?php echo $download['title'] ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-sm-7">
                <!-- Tab panes -->
                <div class="tab-content no-border">
                    <?php foreach ($downloads as $download): ?>
                        <div class="tab-pane fade" id="vertical-tab<?php echo $download['iddownload'] ?>">
                            <h3 class="poppins"><?php echo $download['title'] ?></h3>
                            <a href="<?php echo $download->getLinkToFile() ?>" target="_blank"><img
                                        src="/uploads/files/icon/<?php echo $download['file_icon'] ?>"></a>
                            <p class="mt-25"><a href="<?php echo $download->getLinkToFile() ?>" target="_blank"
                                                class="theme_button color1 inverse small_button min_width_button cms-btn-2">pobierz
                                    katalog</a></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>