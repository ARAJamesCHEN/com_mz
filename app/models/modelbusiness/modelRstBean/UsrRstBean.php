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

    private $usrName;

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