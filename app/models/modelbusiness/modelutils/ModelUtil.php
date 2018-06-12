<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 12:23 PM
 */

namespace app\models\modelbusiness\modelutils;

use app\controllers\formbeans\CreateNewPollFormBean;
use app\models\modelbusiness\modelVOs\PollModelVO;
use app\models\modelbusiness\modelVOs\PollOptionModelVO;

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

}