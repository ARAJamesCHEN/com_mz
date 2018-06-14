<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/12
 * Time: 19:57
 */

namespace comphp\base;

use app\models\modelInterface\BoardModelService;
use app\models\modelInterface\PollModelService;
use app\models\modelInterface\PollOptionService;
use app\models\modelInterface\UsrModelService;

class Handler
{

    protected function callPollOptionService(PollOptionService $pollOptionService){
        return $pollOptionService;
    }

    protected function  callPollModelService(PollModelService $pollModelService){

        return $pollModelService;

    }

    protected  function  callBoardModelService(BoardModelService $boardModelService){

        return $boardModelService;

    }

    protected  function  callUsrModelService(UsrModelService $usrModelService){

        return $usrModelService;

    }

}