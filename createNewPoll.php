<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 18:28
 */
define('APP_PATH', __DIR__ . '/');

define('APP_DEBUG', true);

require(APP_PATH . 'comphp/Comphp.php');

$config = require(APP_PATH . 'config/config.php');

$_SESSION[ 'thePageName' ] = 'createNewPoll';

if(isset($_POST['question'])){
    echo $_POST['question'];
    echo $_POST['option1'];
}else{
    echo 'No find';
}

(new comphp\Comphp($config))->run();

