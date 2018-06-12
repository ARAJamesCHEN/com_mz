<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/11
 * Time: 21:37
 */

namespace app\models\modelbusiness\modelHandler;
use app\models\modelbusiness\modelVOs\PollOptionModelVO;
use app\models\modelInterface\PollModelServiceImpl;
use app\models\modelInterface\PollOptionService;
use app\models\modelInterface\PollOptionServiceImpl;
use comphp\db\db;

use comphp\base\Model;
use app\models\modelbusiness\modelutils\ModelUtil;
use app\models\modelbusiness\modelEntity\PollModel;
use app\models\modelbusiness\modelVOs\PollModelVO;
use comphp\base\RstBean;
use app\models\modelInterface\PollModelService;

class PollandOptionModelHandler extends Model
{

    /**
     * Transaction is used here
     * poll and polloption all success or all fail
     *
     * rollback if any of the process has error
     * http://php.net/manual/zh/mysqli.begin-transaction.php
     * http://php.net/manual/zh/mysqli.rollback.php
     * @param PollModel $pollModel
     * @param PollModelVO $pollModelVO
     * @param PollOptionModel $pollOptionModel
     * @param $pollOptions
     * @throws \Exception
     */
    public function pollAndOptionTranstionFlow(PollModelVO $pollModelVO, $pollOptions){

        $rslt = new RstBean();

        //transation
        $mysqliCon = Db::getDB()->getDbConnForStmt();

        try {
            $mysqliCon->begin_transaction();

            try {
                $rst = $this->callAddPollService(new PollModelServiceImpl() ,$pollModelVO);
            } catch (\Exception $e) {
                var_dump($pollModelVO);
                throw new \Exception('insert a poll failure!'. $e->getMessage());
            }

            $insertID = $rst->getResult();

            if (!$insertID) {
                throw new \Exception('insert a poll failure! no insert id return!');
            }

            foreach ($pollOptions as $key => $value) {
                $pollOptionModelVO = (new ModelUtil())->getPollOptionModelVO($key, $value, $insertID);
                //var_dump($pollOptionModelVO);

                $rst = $this->callAddPollOptionService(new PollOptionServiceImpl(), $pollOptionModelVO);

                if(!$rst->isSuccess()){
                    var_dump($pollOptionModelVO);
                    throw new \Exception('insert a poll option failure,some reason:'.$pollOptionModelVO->getOptionName() );
                }

            }

            $mysqliCon->commit();
            $mysqliCon->close();
        } catch (\Exception $e) {

            $mysqliCon->rollback();
            throw new \Exception('insert a poll failure,some reason:'. $e->getMessage() );

        }

        $rslt->setResult($insertID);
        $rslt->setIsSuccess(true);

        return $rslt;


    }

    private function  callAddPollService(PollModelService $pollModelService, PollModelVO $pollModelVO){

        return $pollModelService->addNewPoll($pollModelVO);


    }

    private function callAddPollOptionService(PollOptionService $pollOptionService,PollOptionModelVO $pollOptionModelVO){

        return $pollOptionService->addNewPollOptions($pollOptionModelVO);

    }


}