<h1 class="title">Strona: edycja zawartości</h1>
<div class="form-actions">
    <?php echo link_to('Zapisz kopie', 'page/backup?idpage='.$sf_params->get('idpage'), array('class' => 'btn btn-primary')) ?>
    <?php echo link_to('Lista kopii', 'page/backuplist?idpage='.$sf_params->get('idpage'), array('class' => 'btn')) ?>
</div>    
<div class="over">
    <div class="fl">
        <ul class="nav nav-tabs">
            <li><a href="#pl" data-toggle="tab" class="active">Polski</a></li>
            <?php foreach ($lang_installs as $lang_install): ?>
                <li><a href="#<?php echo $lang_install->getSignature() ?>" data-toggle="tab"><?php echo $lang_install->getName() ?></a></li>    
            <?php endforeach; ?>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="pl"><?php include_partial('form', array('form' => $form)) ?></div>
            <?php foreach ($lang_installs as $lang_install): ?>
                <div class="tab-pane" id="<?php echo $lang_install->getSignature() ?>"><?php include_partial('bpcmsPageI18n/form', array('form_lang' => $lang_install->getObjectType('BpcmsPageI18n', 'page_idpage', $sf_params->get('idpage')), 'signature' => $lang_install->getSignature())) ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
