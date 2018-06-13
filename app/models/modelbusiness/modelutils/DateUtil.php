<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 12:33 PM
 */

namespace app\models\modelbusiness\modelutils;


class DateUtil
{
    public function getCurrentDate(){

        date_default_timezone_set('UTC');

        $today = date("Y-m-d");

        return $today;
    }

    public function getFormatDate($datePara){

        if($datePara){
            $date=date_create($datePara);
            return date_format($date,"l dS \of F Y ");
        }

    }
}