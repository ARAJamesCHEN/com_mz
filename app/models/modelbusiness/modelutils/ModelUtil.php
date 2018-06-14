<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 12:23 PM
 */

namespace app\models\modelbusiness\modelutils;

use app\controllers\formbeans\CreateNewPollFormBean;
use app\models\modelbusiness\modelRstBean\UsrRstBean;
use app\models\modelbusiness\modelVOs\PollModelVO;
use app\models\modelbusiness\modelVOs\PollOptionModelVO;
use app\models\modelbusiness\modelRstBean\BoardRstBean;
use app\models\modelbusiness\modelRstBean\PollRstBean;
use app\models\modelbusiness\modelRstBean\PollOptionsRstBean;

class ModelUtil
{

    public function getPollModelVO(CreateNewPollFormBean $formBean){
        $pollModelVO = new PollModelVO();

        $pollModelVO->setBoardID($formBean->getSelectedBoard());
        $pollModelVO->setContent($formBean->getContent());
        $pollModelVO->setOptionType($formBean->isMultiple() ? 'M' : 'S');
        $pollModelVO->setPostNum(0);
        $pollModelVO->setViewNum(0);
        $pollModelVO->setPostDate((new DateUtil())->getCurrentDate());
        $pollModelVO->setQuestion($formBean->getQuestion());
        $pollModelVO->setUserID($formBean->getUsrId());
        $pollModelVO->setSys(DB_SYS);

        return $pollModelVO;
    }

    public function getPollOptionModelVO($optionKey, $optionName,$newPollID){
        $pollOptionModelVO = new PollOptionModelVO();

        $pollOptionModelVO->setOptionName($optionName);
        $pollOptionModelVO->setOptionValue($optionKey);
        $pollOptionModelVO->setPollID($newPollID);
        $pollOptionModelVO->setVotedNum(0);
        $pollOptionModelVO->setSys(DB_SYS);

        return $pollOptionModelVO;

    }

    public function getAllPollRstBean($result){
        if (!is_null($result)) {

            $pollRstBeanCollection = array();
            $rows = $result->fetchAll();

            if(!is_null($rows) && $rows){
                foreach ($rows as $aRow) {
                    $pollRstBean = new PollRstBean();
                    $pollRstBean->setPollID($aRow['pollID']);
                    $pollRstBean->setBoardID($aRow['boardID']);
                    $pollRstBean->setContent($aRow['content']);
                    $pollRstBean->setOptionType($aRow['optionType']);
                    $pollRstBean->setPostDate($aRow['postDate']);
                    $pollRstBean->setPostNum($aRow['postNum']);
                    $pollRstBean->setViewNum($aRow['viewNum']);
                    $pollRstBean->setUserID($aRow['userID']);
                    $pollRstBean->setQuestion($aRow['question']);
                    array_push($pollRstBeanCollection, $pollRstBean);
                }
            }

            return $pollRstBeanCollection;
        }
    }

    public function getPollRstBean($result)
    {

        if (!is_null($result)) {
            $pollRstBean = new PollRstBean();

            while ($aRow = $result->fetch()) {
                $pollRstBean->setPollID($aRow['pollID']);
                $pollRstBean->setBoardID($aRow['boardID']);
                $pollRstBean->setContent($aRow['content']);
                $pollRstBean->setOptionType($aRow['optionType']);
                $pollRstBean->setPostDate($aRow['postDate']);
                $pollRstBean->setPostNum($aRow['postNum']);
                $pollRstBean->setViewNum($aRow['viewNum']);
                $pollRstBean->setUserID($aRow['userID']);
                $pollRstBean->setQuestion($aRow['question']);

            }

            return $pollRstBean;
        }
    }


    public function getPollOptionRstBean($result){
        if(!is_null($result)){
            $pollOptionRstBeanCollection = array();

            while ($aRow = $result->fetch()) {
                $pollOptionRstBean = new PollOptionsRstBean();
                $pollOptionRstBean->setPollID($aRow['pollID']);
                $pollOptionRstBean->setPollOptionID($aRow['pollOptionID']);
                $pollOptionRstBean->setVotedNum($aRow['votedNum']);
                $pollOptionRstBean->setOptionValue($aRow['optionValue']);
                $pollOptionRstBean->setOptionName($aRow['optionName']);

                $pollOptionRstBeanCollection[$aRow['optionValue']]=$pollOptionRstBean;
            }

            return $pollOptionRstBeanCollection;
        }
    }

    public function getPollOptionVotedPercentage($result){
        if(!is_null($result)){
            $votedPercentage = 0;
            $totalVotedNum =0;
            while ($aRow = $result->fetch()) {
                $votedPercentage = $aRow['PercentageOfVote'];
                $totalVotedNum =  $aRow['TotalVote'];
            }

            //var_dump($votedPercentage);

            $rst['PercentageOfVote'] =  intval($votedPercentage);
            $rst['TotalVote'] =  intval($totalVotedNum);

            return $rst;
        }
    }

    public function getUsrRstBean($result)
    {

        if (!is_null($result)) {
            $usrRstBean = new UsrRstBean();

            while ($aRow = $result->fetch()) {
                $usrRstBean->setUsrName($aRow['loginName']);
            }

            return $usrRstBean;
        }
    }

    public function getBoardRstBean($result)
    {

        if (!is_null($result)) {
            $boardRstBean = new BoardRstBean();

            while ($aRow = $result->fetch()) {
                $boardRstBean->setBoardName($aRow['boardName']);
            }

            //var_dump($boardRstBean);

            return $boardRstBean;
        }
    }


    public function getPollUsrBoardUnionRstBean($result){
        if (!is_null($result)) {

            $pollRstBeanCollection = array();
            $rows = $result->fetchAll();

            if(!is_null($rows) && $rows){
                foreach ($rows as $aRow) {
                    $pollRstBean = new PollRstBean();
                    $pollRstBean->setPollID($aRow['pollID']);
                    $pollRstBean->setBoardID($aRow['boardID']);
                    $pollRstBean->setContent($aRow['content']);
                    $pollRstBean->setOptionType($aRow['optionType']);
                    $pollRstBean->setPostDate($aRow['postDate']);
                    $pollRstBean->setPostNum($aRow['postNum']);
                    $pollRstBean->setViewNum($aRow['viewNum']);
                    $pollRstBean->setUserID($aRow['userID']);
                    $pollRstBean->setQuestion($aRow['question']);
                    $pollRstBean->setBoardName($aRow['boardName']);
                    $pollRstBean->setUserName($aRow['loginName']);
                    array_push($pollRstBeanCollection, $pollRstBean);
                }
            }

            //var_dump($pollRstBeanCollection);

            return $pollRstBeanCollection;

        }
    }




}