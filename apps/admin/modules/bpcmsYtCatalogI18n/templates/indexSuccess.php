<h1>Bpcms yt catalog i18ns List</h1>

<table>
    <thead>
    <tr>
        <th>Bpcms yt catalog idbpcms yt catalog</th>
        <th>Bpcms lang install signature</th>
        <th>Lang name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($bpcms_yt_catalog_i18ns as $bpcms_yt_catalog_i18n): ?>
        <tr>
            <td>
                <a href="<?php echo url_for('bpcmsYtCatalogI18n/edit?bpcms_yt_catalog_idbpcms_yt_catalog=' . $bpcms_yt_catalog_i18n->getBpcmsYtCatalogIdbpcmsYtCatalog() . '&bpcms_lang_install_signature=' . $bpcms_yt_catalog_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_yt_catalog_i18n->getBpcmsYtCatalogIdbpcmsYtCatalog() ?></a>
            </td>
            <td>
                <a href="<?php echo url_for('bpcmsYtCatalogI18n/edit?bpcms_yt_catalog_idbpcms_yt_catalog=' . $bpcms_yt_catalog_i18n->getBpcmsYtCatalogIdbpcmsYtCatalog() . '&bpcms_lang_install_signature=' . $bpcms_yt_catalog_i18n->getBpcmsLangInstallSignature()) ?>"><?php echo $bpcms_yt_catalog_i18n->getBpcmsLangInstallSignature() ?></a>
            </td>
            <td><?php echo $bpcms_yt_catalog_i18n->getLangName() ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="<?php echo url_for('bpcmsYtCatalogI18n/new') ?>">New</a>
