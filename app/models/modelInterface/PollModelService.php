<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 10:46 AM
 */
namespace app\models\modelInterface;
use app\models\modelbusiness\modelVOs\PollModelVO;

interface PollModelService
{

   public function addNewPoll(PollModelVO $pollModelVO);

   public function searchPollByID($pollID);

   public function searchPollByBoardID($boardID);

}