<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 5/06/2018
 * Time: 12:54 PM
 */

define('APP_PATH', __DIR__ . '/');

define('PAGE_ID', "login" );

define('CONTROLLER_PATH', __DIR__ . '/app/controllers');

define('APP_DEBUG', true);

session_save_path( './' );
session_start();

$_SESSION[ 'thePageName' ] = 'login';

require(APP_PATH . 'comphp/Comphp.php');

$config = require(APP_PATH . 'config/config.php');

(new comphp\Comphp($config))->run();