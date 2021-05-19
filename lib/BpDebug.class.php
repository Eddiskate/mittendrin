<?php
/**
 * Created by PhpStorm.
 * User: eddi
 * Date: 13.12.17
 * Time: 21:56
 */

class BpDebug {
    public function __construct()
    {

    }

    public static function printr($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
    }
}