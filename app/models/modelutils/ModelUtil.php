<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 12:23 PM
 */

namespace app\models\modelutils;

use app\controllers\formbeans\CreateNewPollFormBean;
use app\models\modelVOs\PollModelVO;

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
        $pollModelVO->setUserID($_SESSION[ 'userID' ]);
        $pollModelVO->setSys(DB_SYS);

        return $pollModelVO;
    }

}