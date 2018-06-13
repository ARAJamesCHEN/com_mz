<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/12
 * Time: 19:57
 */

namespace comphp\base;

use app\models\modelbusiness\modelVOs\PollModelVO;
use app\models\modelInterface\BoardModelService;
use app\models\modelInterface\PollModelService;
use app\models\modelInterface\PollOptionService;
use app\models\modelbusiness\modelVOs\PollOptionModelVO;
use app\models\modelInterface\UsrModelService;

class Handler
{

    protected function  callAddPollService(PollModelService $pollModelService, PollModelVO $pollModelVO){

        return $pollModelService->addNewPoll($pollModelVO);


    }

    protected function callAddPollOptionService(PollOptionService $pollOptionService,PollOptionModelVO $pollOptionModelVO){

        return $pollOptionService->addNewPollOptions($pollOptionModelVO);

    }

    protected function  callPollModelServiceForSearch(PollModelService $pollModelService, $pollID){

        return $pollModelService->searchPollByID($pollID);


    }

    protected function  callPollOptionModelServiceForSearch(PollOptionService $pollOptionService, $pollID){

        return $pollOptionService->searchPollOptionsByPollID($pollID);


    }

    protected function  callPollOptionModelServiceForVotedPercentage(PollOptionService $pollOptionService, $pollOptionID){

        return $pollOptionService->searchPollOptionsVotedPercentageByID($pollOptionID);


    }

    protected  function  callBoardModelServiceForSearch(BoardModelService $boardModelService, $boardID){

        return $boardModelService->searchBoardByID($boardID);

    }

    protected  function  callUsrModelServiceForSearch(UsrModelService $usrModelService, $usrID){

        return $usrModelService->searchUsrInfoByID($usrID);

    }
}