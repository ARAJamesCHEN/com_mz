<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 5/06/2018
 * Time: 12:57 PM
 */
namespace app\controllers;

use app\models\modelInterface\BoardModelServiceImpl;
use app\models\modelInterface\PollAndOptionUnionServiceImpl;
use comphp\base\Controller;
use comphp\base\Handler;

const POST_QUERY_INIT = 'query';

class PostController extends Controller
{

    private $boardName;

    private $pollRstBeanCollection;

    public function init()
    {

        $boardId = 1;

        if(strrpos($this->_actionName,"board")>0){

            //echo 'haha';

            $begin = strrpos($this->_actionName,"_") + 1;

            $boardId = intval(substr($this->_actionName,$begin));

        }

        $this->displayAllPost($boardId);

        $this->assign('boardName',$this->boardName);

        $this->assign('pollRstBeanCollection',$this->pollRstBeanCollection);

        $this->render();
    }

    public function displayAllPost($boardId){

        //var_dump($boardId);

        /*$boardRstBean = (new Handler())->callBoardModelService(new BoardModelServiceImpl())->searchBoardByID($boardId);

        if($boardRstBean->isSuccess()){

            $this->boardName = $boardRstBean->getBoardName();

        }*/

        $rst = (new Handler())->callPollAndOptionsUnionService(new PollAndOptionUnionServiceImpl())->searchPollUsrBoardUnionByBoardID($boardId);

        //var_dump($rst);

        if($rst->isSuccess()){

            //var_dump($boardRstBean);

            $boardRstBean = $rst->getResult();

            $this->boardName = $boardRstBean->getBoardName();

            $this->pollRstBeanCollection = $boardRstBean->getPollRstBeanCollection();

            //var_dump($this->pollRstBeanCollection);

        }else{

            $this->_formbean->setWarning('Fail to get polls');

        }



    }

}