<section class="section section--first">
    <div class="row">
        <div class="col-xs-12">
            <div class="section__title section__title--single clearfix">
                <h2><?php echo sfConfig::get('bpcms_header_title') ?></h2>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-lg-12">
            <?php echo $cms['body'] ?>
            <?php //echo $page->getLangPageBody() ?>
            <?php include_component('plugin', 'radiopage') ?>
            <?php if ($sf_user->getAttribute('lang_content_id') == 2): ?>
                <div class="col-md-2"></div>

                <form class="col-md-8" id="stimme-form" action="#" method="post">
                    <div class="alert alert-success alert-dismissible fade in stimme-form-alert" role="alert" style="display: none;"></div>

                    <div class="form-group">
                        <label for="name"><?php echo LANG_STIMME_FORM_LABEL_NAME ?></label>
                        <input type="text" class="form-control" id="name" placeholder="" name="name">
                    </div>
                    <div class="form-group">
                        <label for="city"><?php echo LANG_STIMME_FORM_LABEL_PLACE_OF_RESIDENCE ?></label>
                        <input type="text" class="form-control" id="city" placeholder="" name="city">
                    </div>
                    <div class="form-group">
                        <label for="name"><?php echo LANG_STIMME_ON_THE_OCCASION_OF ?></label>
                        <input type="text" class="form-control" id="occasion" placeholder="" name="occasion">
                    </div>
                    <div class="form-group">
                        <label for="name"><?php echo LANG_STIMME_FORM_LABEL_DESCRIPTION ?></label>
                        <textarea name="description" id="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="music_service"><?php echo LANG_STIMME_FORM_LABEL_MUSIC_SERVICE ?></label>
                        <input type="text" class="form-control" id="music_service" placeholder="" name="music_service">
                    </div>

                    <div class="stime-privacy-policy">
                        <?php echo LANG_STIMME_FORM_PRIVACY_POLICY ?>
                    </div>
                    <button type="submit" class="btn btn-default"
                            style="float: right;"><?php echo LANG_STIMME_FORM_LABEL_SUBMIT ?></button>
                </form>
                <div class="col-md-2"></div>
            <?php endif; ?>
            <?php include_component('themes', 'moduleDiplomas') ?>
        </div>
    </div>
</section>
