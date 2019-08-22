<?php
/**
 * Created by PhpStorm.
 * User: wangxianpeng
 * Date: 2019-08-22
 * Time: 14:05
 */

spl_autoload_register(function ($class_name) {
    if (class_exists($class_name)) {
        return;
    }

    $split = explode('\\', $class_name);
    if ($split[0] != 'Sample') {
        return;
    }

    $class_file = dirname(__DIR__) . '/output/php/' . join('/', $split) . '.php';

    //echo $class_file;die;

    if (file_exists($class_file)) {
        require_once $class_file;
    }

    return;
});

//require_once "vendor/autoload.php";