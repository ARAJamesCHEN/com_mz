<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 11:56 AM
 */

namespace app\models\modelInterface;

use app\models\modelbusiness\modelEntity\BoardModel;
use comphp\base\RstBean;

class BoardModelServiceImpl implements BoardModelService
{
    public function searchAllBoard(){


        $rslt = new RstBean();

        $boradModel = new BoardModel();

        $result = $boradModel->searchAllBoard();

        $rslt->setResult($result);
        $rslt->setIsSuccess(true);


        return $rslt;

    }
}