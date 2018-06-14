<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/11
 * Time: 21:37
 */

namespace app\models\modelbusiness\modelHandler;

use app\models\modelbusiness\modelutils\DateUtil;
use app\models\modelInterface\BoardModelServiceImpl;
use app\models\modelInterface\PollModelServiceImpl;
use app\models\modelInterface\PollOptionServiceImpl;
use app\models\modelInterface\UsrModelServiceImpl;
use comphp\db\db;

use app\models\modelbusiness\modelutils\ModelUtil;
use app\models\modelbusiness\modelEntity\PollModel;
use app\models\modelbusiness\modelVOs\PollModelVO;
use comphp\base\RstBean;

use comphp\base\Handler;

/**
 * back-end business workflow handler
 * Class PollandOptionModelHandler
 * @package app\models\modelbusiness\modelHandler
 */
class PollandOptionModelHandler extends Handler
{

    /**
     * Transaction is used here
     * poll and polloption all success or all fail
     *
     * rollback if any of the process has error
     * http://php.net/manual/zh/mysqli.begin-transaction.php
     * http://php.net/manual/zh/mysqli.rollback.php
     * @param PollModel $pollModel
     * @param PollModelVO $pollModelVO
     * @param PollOptionModel $pollOptionModel
     * @param $pollOptions
     * @throws \Exception
     * @return mixed
     */
    public function pollAndOptionTranstionFlow(PollModelVO $pollModelVO, $pollOptions){

        $rslt = new RstBean();

        //transation
        $mysqliCon = Db::getDB()->getDbConnForStmt();

        try {
            $mysqliCon->begin_transaction();

            try {
                $rst = $this->callPollModelService(new PollModelServiceImpl())->addNewPoll($pollModelVO);
            } catch (\Exception $e) {
                var_dump($pollModelVO);
                throw new \Exception('insert a poll failure!'. $e->getMessage());
            }

            $insertID = $rst->getResult();

            if (!$insertID) {
                throw new \Exception('insert a poll failure! no insert id return!');
            }

            foreach ($pollOptions as $key => $value) {
                $pollOptionModelVO = (new ModelUtil())->getPollOptionModelVO($key, $value, $insertID);
                //var_dump($pollOptionModelVO);

                $rst = $this->callPollOptionService(new PollOptionServiceImpl())->addNewPollOptions($pollOptionModelVO);

                if(!$rst->isSuccess()){
                    var_dump($pollOptionModelVO);
                    throw new \Exception('insert a poll option failure,some reason:'.$pollOptionModelVO->getOptionName() );
                }

            }

            $mysqliCon->commit();
            $mysqliCon->close();
        } catch (\Exception $e) {

            $mysqliCon->rollback();
            throw new \Exception('insert a poll failure,some reason:'. $e->getMessage() );

        }

        $rslt->setResult($insertID);
        $rslt->setIsSuccess(true);



        return $rslt;


    }

    /**
     * @param $pollID
     * @return RstBean
     */
    public function getPollAndPollOptionsByPollID($pollID){

        $rslt = new RstBean();


        //var_dump($pollID);

        //poll result
        $pollRst = $this->callPollModelService(new PollModelServiceImpl())->searchPollByID($pollID);
        //var_dump("here");


        $pollRstBean = $pollRst->getResult();

        //var_dump($pollRstBean);

        // board Rst
        $boardRstBean = $this->callBoardModelService(new BoardModelServiceImpl())->searchBoardByID($pollRstBean->getBoardID());

        //var_dump($boardRstBean);

        $pollRstBean->setBoardName($boardRstBean->getBoardName());

        //user name rst
        $usrRst = $this->callUsrModelService(new UsrModelServiceImpl())->searchUsrInfoByID($pollRstBean->getUserID());
        $pollRstBean->setUserName($usrRst->getUsrName());
        $pollRstBean->setPostDateDisplay((new DateUtil())->getFormatDate($pollRstBean->getPostDate()));

        //poll option result
        $pollOptionRst = $this->callPollOptionService(new PollOptionServiceImpl())->searchPollOptionsByPollID($pollID);

        //var_dump($pollOptionRst);

        $pollOptionRstCollection = $pollOptionRst->getResult();

        foreach ($pollOptionRstCollection as $key=>$pollOptionRst){

            $optionID = $pollOptionRst->getPollOptionID();

            $rst = $this->callPollOptionService(new PollOptionServiceImpl())->searchPollOptionsVotedPercentageByID($optionID);

            $theArray = $rst->getResult();

            $pollOptionRst->setVotedPercentage(intval($theArray['PercentageOfVote']));
            $pollRstBean->setTotalVotedNum(intval($theArray['TotalVote']));
            $pollOptionRstCollection[$key] = $pollOptionRst;

            //var_dump($pollOptionRst);

        }

        $rsltArray = [$pollRstBean, $pollOptionRstCollection];

        //var_dump($rsltArray);

        if(is_null($rsltArray) || !$rsltArray){
            $rslt->setIsSuccess(false);
        }else{
            $rslt->setIsSuccess(true);
            $rslt->setResult($rsltArray);
        }

        return $rslt;
    }


}