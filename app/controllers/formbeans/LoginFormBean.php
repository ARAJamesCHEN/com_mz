<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 9:20
 */

namespace app\controllers\formbeans;

use comphp\base\FormBean;

class LoginFormBean extends FormBean
{

    private $formUsrName;

    private $formUsrPwd;

    /**
     * @return mixed
     */
    public function getFormUsrName()
    {
        return $this->formUsrName;
    }

    /**
     * @param mixed $formUsrName
     */
    public function setFormUsrName($formUsrName): void
    {
        $this->formUsrName = $formUsrName;
    }

    /**
     * @return mixed
     */
    public function getFormUsrPwd()
    {
        return $this->formUsrPwd;
    }

    /**
     * @param mixed $formUsrPwd
     */
    public function setFormUsrPwd($formUsrPwd): void
    {
        $this->formUsrPwd = $formUsrPwd;
    }



}

class LoginFormBeanFactory
{
    public static function create()
    {
        return new LoginFormBean();
    }
}