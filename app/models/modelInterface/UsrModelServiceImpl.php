<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 1:08 PM
 */

namespace app\models\modelInterface;


use app\models\modelbusiness\modelEntity\UserModel;
use app\models\modelbusiness\modelutils\ModelUtil;
use comphp\base\RstBean;
use app\models\modelbusiness\modelRstBean\UsrRstBean;

class UsrModelServiceImpl implements UsrModelService
{

    public function searchUsrInfoByLoginName($loginName)
    {
        // TODO: Implement searchUsrInfoByLoginName() method.
        $rst = new RstBean();

        $usrModel = new UserModel();

        $userInfo = $usrModel->searchUsrInfoByLoginName($loginName);

        $rst->setIsSuccess(true);

        $rst->setResult($userInfo);

        return $rst;
    }

    public function searchUsrInfoByID($usrID)
    {
        // TODO: Implement searchUsrInfoByID() method.
        $rst = new UsrRstBean();

        $usrModel = new UserModel();

        $userInfo = $usrModel->searchUsrInfoByUsrID($usrID);

        $rst = (new ModelUtil())->getUsrRstBean($userInfo);

        $rst->setIsSuccess(true);

        return $rst;
    }
}