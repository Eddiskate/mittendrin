<h1><?php echo LANG_STIMME_GREETINGS_TO_DATE ?> <?php echo $sf_params->get('date') ? $sf_params->get('date') : $_POST['stimme']['date'] ?></h1>

<?php include_partial('form', array('form' => $form)) ?>
