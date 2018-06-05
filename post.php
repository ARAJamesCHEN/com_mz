<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 5/06/2018
 * Time: 12:55 PM
 */

define('APP_PATH', __DIR__ . '/');

define('APP_DEBUG', true);

require(APP_PATH . 'comphp/Comphp.php');

$config = require(APP_PATH . 'config/config.php');

(new comphp\Comphp($config))->run();