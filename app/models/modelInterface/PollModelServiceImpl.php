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
use app\models\modelbusiness\modelutils\ModelUtil;
use app\models\modelbusiness\modelRstBean\PollRstBean;

class PollModelServiceImpl implements PollModelService
{

    /**
     * @param PollModelVO $pollModelVO
     * @return RstBean
     */
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

    /**
     * @param $pollID
     * @return RstBean
     */
    public function searchPollByID($pollID)
    {

        $rst = new PollRstBean();

        $pollModel = new PollModel();

        $result = $pollModel->searchPollByID($pollID);

        $rstBean = (new ModelUtil())->getPollRstBean($result);

        if(is_null($result) || !$result){
            $rst->setIsSuccess(false);
        }else{
            $rst->setIsSuccess(true);
            $rst->setResult($rstBean);
        }

        return $rst;

    }

    public function searchPollByBoardID($boardID)
    {

        $resultForReturn = new RstBean();

        $pollModel = new PollModel();

        //var_dump($boardID);

        $result = $pollModel->searchPollByBoardID($boardID);

        //var_dump($result);

        $rst = (new ModelUtil())->getAllPollRstBean($result);

        if(is_null($result) || !$result){
            $resultForReturn->setIsSuccess(false);
        }else{
            $resultForReturn->setIsSuccess(true);
            $resultForReturn->setResult($rst);
        }

        return $resultForReturn;
    }
}