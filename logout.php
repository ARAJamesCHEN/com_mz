<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 17:35
 */
define('APP_PATH', __DIR__ . '/');

define('PAGE_ID', "login" );

define('CONTROLLER_PATH', __DIR__ . '/app/controllers');

define('APP_DEBUG', true);

require(APP_PATH . 'comphp/Comphp.php');

$config = require(APP_PATH . 'config/config.php');

(new comphp\Comphp($config))->run();