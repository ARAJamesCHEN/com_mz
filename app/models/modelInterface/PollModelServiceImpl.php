<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 10:50 AM
 */

namespace app\models\modelInterface;
use app\models\modelbusiness\modelEntity\PollModel;
use app\models\modelbusiness\modelVOs\PollModelVO;
use comphp\base\RstBean;

class PollModelServiceImpl implements PollModelService
{

    public function addNewPoll(PollModelVO $pollModelVO)
    {
        $rst = new RstBean();

        $pollModel = new PollModel();

        $insert_id = $pollModel->addNewPoll($pollModelVO);

        if($insert_id){
            $rst->setIsSuccess(true);
        }else{
            $rst->setIsSuccess(false);
        }

        $rst->setResult($insert_id);

        return $rst;

    }




}