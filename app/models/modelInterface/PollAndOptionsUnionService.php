<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 3:31 PM
 */

namespace app\models\modelInterface;
use app\models\modelbusiness\modelVOs\PollModelVO;


interface PollAndOptionsUnionService
{

    /**
     * add new poll and poll options
     * @param PollModelVO $pollModelVO
     * @param $pollOptions
     * @return mixed
     */
    public function addNewPollWithOption(PollModelVO $pollModelVO,$pollOptions);

}