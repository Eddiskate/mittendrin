<header class="header">
    <div class="row">
        <div class="col-xs-12">
            <button class="header__mobile-menu">
                <span class="lnr lnr-menu"></span>
                <span class="lnr lnr-cross"></span>
            </button>
            <a class="header__logo" href="<?php echo $sf_params->get('culture') ? url_for('@homepage_lang?culture=de') : url_for('@homepage') ?>">
                <img src="<?php echo sfConfig::get('bpcms_themes_path') ?>/img/mitt-logo-top.svg" alt="">
            </a>
            <ul class="header__actions">
                <li class="header__actions-item header-headphones">
                    <img src="<?php echo sfConfig::get('bpcms_themes_path') ?>/img/headphones.svg">
                </li>

                <li class="header__actions-item mr-15">
                    <span class="header-listen-text"><?php echo LANG_HEADER_ACTIONS_LISTEN_RADIO_TEXT ?></span>
                </li>

                <li class="header__actions-item">
                    <a href="http://player.mittendrin.pl/radio-region.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=600');return false;"
                       class="btn-mittendrin-radio btn-mittendrin"><?php echo LANG_HEADER_ACTIONS_LISTEN_RADIO_1_TEXT ?></a>
                </li>

                <li class="header__actions-item ml-15">
                    <a href="http://player.mittendrin.pl/radio-altneu.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=600');return false;"
                       class="btn-mittendrin-radio btn-mittendrin"><?php echo LANG_HEADER_ACTIONS_LISTEN_RADIO_2_TEXT ?></a>
                </li>

                <li class="header__actions-item">
                    <a class="actions-btn icon-culture flags-pl btn-flags <?php if(!$sf_params->get('culture')): ?>active<?php endif; ?>" href="<?php echo url_for('home/changeLang?culture=pl') ?>">
                        <img src="<?php echo sfConfig::get('bpcms_themes_path') ?>/img/republic-of-poland.svg">
                    </a>
                </li>
                <li class="header__actions-item ml-3 btn-flags <?php if($sf_params->get('culture') == 'de'): ?>active<?php endif; ?>">
                    <a class="actions-btn icon-culture flags-de" href="<?php echo url_for('home/changeLang?culture=de') ?>">
                        <img src="<?php echo sfConfig::get('bpcms_themes_path') ?>/img/germany.svg">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<div class="search">
    <button class="search__btn">
        <span class="lnr lnr-cross"></span>
    </button>
    <form action="#" class="search__form">
        <input class="search__input" type="search" placeholder="Enter Keywords">
    </form>
</div>
<aside class="sidebar">
    <div class="sidebar__content scrollbar-sidebar">
        <?php include_component('themes', 'menuTop') ?>
        <div class="row-fluid" id="section-recording">
            <h3><?php echo LANG_PAGE_SIDEBAR_PLAYER_TITLE ?></h3>
            <hr>
            <div class="mittendrin-recording">
                <a href="http://player.mittendrin.pl/radio-region.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=600');return false;"><button><?php echo LANG_HEADER_ACTIONS_LISTEN_RADIO_1_TEXT ?></button></a>
                 <span class="rec-status"></span>
            </div>
            <div class="mp3_title_region"></div>

            <hr>

            <div class="mittendrin-recording">
                <a href="http://player.mittendrin.pl/radio-altneu.php" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=400,height=600');return false;"><button><?php echo LANG_HEADER_ACTIONS_LISTEN_RADIO_2_TEXT ?></button></a> <span class="rec-status"></span>
            </div>
            <div class="mp3_title_altneu"></div>
        </div>
    </div>
    <?php include_component('themes', 'menuBottom') ?>
</aside>
<main class="content-wrap clearfix">
    <div class="content">
        <?php echo $sf_content ?>
        <div class="footer">
            <div class="row">
                <div class="col-sm-3">
                    <div class="sidebar__footer">
                        <div class="sidebar__copyright">
                            <?php echo sfConfig::get('bpcms_footet_text') ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <div class="footer__logo">
                        <a href="<?php echo url_for('@homepage') ?>">
                            <img src="<?php echo sfConfig::get('bpcms_themes_path') ?>/img/mitt-logo-footer.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <ul class="footer__social">
                        <li>
                            <a href="<?php echo sfConfig::get('bpcms_social_link_mc') ?>">
                                <i class="fa fa-soundcloud"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo sfConfig::get('bpcms_social_link_fb') ?>">
                                <i class="fa fa-facebook-official"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo sfConfig::get('bpcms_social_link_youtube') ?>">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
