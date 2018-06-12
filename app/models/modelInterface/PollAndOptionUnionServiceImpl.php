<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 3:32 PM
 */

namespace app\models\modelInterface;

use app\models\modelbusiness\modelVOs\PollModelVO;
use app\models\modelbusiness\modelHandler\PollandOptionModelHandler;

class PollAndOptionUnionServiceImpl implements PollAndOptionsUnionService
{

    /**
     * @param PollModelVO $pollModelVO
     * @param $pollOptions
     * @return mixed
     * @throws \Exception
     */
    public function addNewPollWithOption(PollModelVO $pollModelVO,$pollOptions)
    {
        // TODO: Implement addNewPollWithOption() method.

        $rslt = (new PollandOptionModelHandler())->pollAndOptionTranstionFlow($pollModelVO, $pollOptions);

        return $rslt;

    }

    public function searchPollWithOptionByID($pollID)
    {
        // TODO: Implement searchPollWithOptionByID() method.

        $rslt = (new PollandOptionModelHandler())->getPollAndPollOptionsByPollID($pollID);

        return $rslt;
    }
}