<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 18:25
 */

namespace app\controllers;
use app\controllers\formbeans\CreateNewPollFormBean;
use app\controllers\formbeans\CreateNewPollFormBeanFactory;
use app\models\modelbusiness\modelutils\ModelUtil;
use app\models\modelInterface\PollModelServiceImpl;
use app\models\modelInterface\PollModelService;
use app\models\modelInterface\BoardModelService;
use app\models\modelInterface\BoardModelServiceImpl;
use comphp\base\Controller;


include(APP_PATH . 'app/controllers/formbeans/'.'CreateNewPollFormBean.php');

define('NEWPOLL_ACTION_INIT', "init" );

define('NEWPOLL_ACTION_ADD', "add" );

/**
 * Class CreateNewPollController
 * @package app\controllers
 */
class CreateNewPollController extends Controller
{
    protected $pollModelService;

    protected $boardModelService;

    private $formBean;

    private $boardModel;

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        $this->formBean = CreateNewPollFormBeanFactory::create();

        $boardModelService = new BoardModelServiceImpl();

        $this->initViewParasFunction($boardModelService);

        if ($this->_actionName == NEWPOLL_ACTION_ADD){

            $pollModelService = new PollModelServiceImpl();

            $this->addNewPollFunction($pollModelService);

        }

        $this->assign('warning', $this->formBean->getWarning());

        $this->assign('boardsInfoArray', $this->formBean->getBoards() );
        $this->assign('titleWarning', $this->formBean->getTitleWarning() );
        $this->assign('optionWarning', $this->formBean->getOptionWarning() );
        $this->assign('contentWarning', $this->formBean->getContentWarning() );
        $this->assign('isMutiWarning', $this->formBean->getisMutiWarning());

        $this->render();

    }

    /**
     * @param BoardModelService $boardModelService
     */
    private function initViewParasFunction(BoardModelService $boardModelService){

        $rslt = $boardModelService->searchAllBoard();

        $boardInfos = $rslt->getResult();

        if ( $boardInfos  && $boardInfos->size()>0 ){

            $boardArray = array();

            $rows = $boardInfos->fetchAll();

            foreach ($rows as $key=>$aRow){

                $boardKey = $aRow['boardID'];
                $boardValue = $aRow['boardName'];

                $boardArray[$boardKey] = $boardValue;

            }

            $this->formBean->setBoards($boardArray);

        }

    }

    /**
     * @param PollModelService $comModelIntService
     */
    private function addNewPollFunction(PollModelService $comModelIntService){

        if( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' ) {

            $this->validate($this->formBean);

            if($this->formBean->isHasError()){

                return;

            }

            $pollModelVO = (new ModelUtil())->getPollModelVO($this->formBean);

            $options = $this->formBean->getOptions();

            try {
                $rslt = $comModelIntService->addNewPollWithOption($pollModelVO, $options);
            } catch (\Exception $e) {

                $this->formBean->setWarning("Insert Failure!".$e->getMessage());

            }

            if(!$rslt->isSuccess()){
                $this->formBean->setWarning("Insert Failure!");
            }


        }

    }

    /**
     * validate
     * @param CreateNewPollFormBean $formBean
     */
    private function  validate(CreateNewPollFormBean &$formBean){

        if(is_null($formBean)){
            return;
        }

        $selectedBoardId = $_POST['boardID'];

        $formBean->setSelectedBoard($selectedBoardId);

        $question = $_POST['question'];

        if(strlen($question)>500){

            $formBean->setHasError(true);
            $formBean->setTitleWarning("No more than 500 characters");

        }else{


            $formBean->setQuestion($question);

        }

        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $option5 = $_POST['option5'];

        if(empty($option1) && empty($option2) &&  empty($option3) && empty($option4) && empty($option5)){
            $formBean->setHasError(true);
            $formBean->setOptionWarning("Please input at least one option");
        }else{

            $options = [$option1,$option2,$option3,$option4, $option5];
            $optionsData = array();

            foreach ($options as $option){
                if(!is_null($option) && !empty($option)){
                    array_push($optionsData, $option);
                }
            }

            $formBean->setOptions($optionsData);

        }

        $isMutilChoice = false;

        if(isset($_POST['multi_choice'])){
            $isMutilChoice = $_POST['multi_choice'];
        }

        if(!empty($isMutilChoice)){

            if (!filter_var($isMutilChoice, FILTER_VALIDATE_BOOLEAN)) {
                $formBean->setHasError(true);
                $formBean->setIsMutiWarning("Sorry, you have entered an incorrect multiple choice");
            }else{
                $formBean->setIsMultiple($isMutilChoice);
            }

        }


        $content = $_POST['content'];

        if(strlen($content)>2000){
            $formBean->setHasError(true);
            $formBean->setContentWarning("No more than 2000 characters");
        }else{
            $formBean->setContent($content);
        }



    }
}