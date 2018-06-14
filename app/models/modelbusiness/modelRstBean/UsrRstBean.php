<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/12
 * Time: 21:54
 */

namespace app\models\modelbusiness\modelRstBean;


use comphp\base\RstBean;

class UsrRstBean extends RstBean
{
    private $userID;

    private $usrName;

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }


    /**
     * @return mixed
     */
    public function getUsrName()
    {
        return $this->usrName;
    }

    /**
     * @param mixed $usrName
     */
    public function setUsrName($usrName): void
    {
        $this->usrName = $usrName;
    }



}