<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 10:50 AM
 */

namespace app\models\modelInterface;
use app\models\modelbusiness\modelVOs\PollModelVO;
use app\models\modelbusiness\modelHandler\PollandOptionModelHandler;

class PollModelServiceImpl implements PollModelService
{

    public function addNewPollWithOption(PollModelVO $pollModelVO,$pollOptions)
    {
        // TODO: Implement addNewPollWithOption() method.

        $rslt = (new PollandOptionModelHandler())->pollAndOptionTranstionFlow($pollModelVO, $pollOptions);

        return $rslt;

    }
}