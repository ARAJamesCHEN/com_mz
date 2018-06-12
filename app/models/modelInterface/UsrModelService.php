<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 1:07 PM
 */

namespace app\models\modelInterface;


interface UsrModelService
{

    public function searchUsrInfoByLoginName($loginName);

    public function searchUsrInfoByID($usrID);

}