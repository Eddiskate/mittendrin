<div class="container-header yt-movies-catalog">
    <div class="header"><span class="icons_mittendrin arrow-right"></span> <span
            class="name"><?php echo LANG_YT_MOVIES_PROGRAM_LIST ?></span></div>
    <div class="header-line"></div>
    <ul>
        <?php foreach ($bpcms_yt_catalogs as $bpcms_yt_catalog): ?>
            <li>
                <div class="row">
                    <div class="col-lg-10">
                        <?php echo link_to($bpcms_yt_catalog->getLangName(), $bpcms_yt_catalog->getLinkToShowCatalogUrl()) ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo $bpcms_yt_catalog->getCountMovies() ?>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

<style>
    .yt-movies-catalog {

    }

    .yt-movies-catalog ul {
        list-style: none;
        padding-left: 12px;
    }

    .yt-movies-catalog ul li {
        padding: 10px;
        border-bottom: 1px dotted black;
        font-size: 12px;
        font-weight: bold;
    }
</style>