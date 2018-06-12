<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 3:15 PM
 */

namespace app\models\modelInterface;

use app\models\modelbusiness\modelVOs\PollOptionModelVO;

interface PollOptionService
{

    public function addNewPollOptions(PollOptionModelVO $pollOptionModelVO);

    public function searchPollOptionsByPollID($pollID);

}