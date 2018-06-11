<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 12:33 PM
 */

namespace app\models\modelutils;


class DateUtil
{
    public function getCurrentDate(){

        date_default_timezone_set('UTC');

        $today = date("Y-m-d");

        return $today;
    }

}