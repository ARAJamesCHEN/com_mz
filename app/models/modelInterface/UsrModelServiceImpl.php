<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 1:08 PM
 */

namespace app\models\modelInterface;


use app\models\modelbusiness\modelEntity\UserModel;
use comphp\base\RstBean;

class UsrModelServiceImpl implements UsrModelService
{

    public function searchUsrInfoByLoginName($loginName)
    {
        // TODO: Implement searchUsrInfoByLoginName() method.
        $rst = new RstBean();

        $usrModel = new UserModel();

        $userInfo = $usrModel->searchUsrInfoByLoginName($loginName);

        $rst->setResult($userInfo);

        return $rst;
    }
}