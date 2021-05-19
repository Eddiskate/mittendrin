<p><b>Chumra tagów</b></p>
<p><a href="<?php echo url_for('postTags/new?idpost=' . $sf_params->get('idpost')) ?>" class="btn btn-mini btn-success">utwórz nowy tag</a></p>
<div class="row-fluid">   
    <?php foreach ($post_tagss as $lp => $post_tags): ?>
        <?php if ((($lp + 1) % 6) == 1): ?>
        </div>
        <div class="row-fluid">   
        <?php endif; ?>
        <div class="span2">
            <label class="checkbox">
                <input type="checkbox" name="idpost_tags[]" value="<?php echo $post_tags['idpost_tags'] ?>" <?php echo $post_tags->getSelected() ?>> <?php echo $post_tags['name'] ?>
            </label>            
        </div>
    <?php endforeach; ?>
    <?php if (!$post_tags): ?>
        <p class="text-center">brak dostępnych tagów.</p>
    <?php endif; ?>
</div>