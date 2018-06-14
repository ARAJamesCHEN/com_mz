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
use app\models\modelInterface\PollAndOptionsUnionService;

/**
 * Class Handler
 * @package comphp\base
 */
class Handler
{

    /**
     * @param PollOptionService $pollOptionService
     * @return PollOptionService
     */
    public function callPollOptionService(PollOptionService $pollOptionService){
        return $pollOptionService;
    }

    /**
     * @param PollModelService $pollModelService
     * @return PollModelService
     */
    public function  callPollModelService(PollModelService $pollModelService){

        return $pollModelService;

    }

    /**
     * @param BoardModelService $boardModelService
     * @return BoardModelService
     */
    public  function  callBoardModelService(BoardModelService $boardModelService){

        return $boardModelService;

    }

    /**
     * @param UsrModelService $usrModelService
     * @return UsrModelService
     */
    public  function  callUsrModelService(UsrModelService $usrModelService){

        return $usrModelService;

    }

    /**
     * @param PollAndOptionsUnionService $pollAndOptionsUnionService
     * @return PollAndOptionsUnionService
     */
    public  function  callPollAndOptionsUnionService(PollAndOptionsUnionService $pollAndOptionsUnionService){

        return $pollAndOptionsUnionService;

    }
}