<?php

$location = $sf_params->get('module') .'/'. $sf_params->get('action');

switch ($location) {
    case "home/index":
        include_partial('global/js_homepage');
        break;
    case "post/index":
        include_partial('global/js_navbar');
        include_partial('global/js_post');
        break;
    case "post/list":
        include_partial('global/js_navbar');
        include_partial('global/js_post');
        break;
    case "post/tags":
        include_partial('global/js_navbar');
        include_partial('global/js_post');
        break;
    case "cart/show":
        include_partial('global/js_stimme');
        break;
    default:
        include_partial('global/js_navbar');
        include_partial('global/js_radio');
        break;

}

?>

