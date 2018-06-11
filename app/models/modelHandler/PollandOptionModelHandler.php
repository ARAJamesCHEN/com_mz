<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/11
 * Time: 21:37
 */

namespace app\models\modelHandler;
use comphp\db\db;

use comphp\base\Model;
use app\models\modelutils\ModelUtil;
use app\models\PollModel;
use app\models\PollOptionModel;
use app\models\modelVOs\PollModelVO;
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
    public function pollAndOptionTranstionFlow(PollModel $pollModel,PollModelVO $pollModelVO,
                                               PollOptionModel $pollOptionModel, $pollOptions){
        //transation
        $mysqliCon = Db::getDB()->getDbConnForStmt();

        try {
            $mysqliCon->begin_transaction();

            try {
                $insertID = $pollModel->addNewPoll($pollModelVO);
            } catch (\Exception $e) {
                var_dump($pollModelVO);
                $mysqliCon->rollback();
                throw new \Exception('insert a poll failure!'. $e->getMessage());
            }

            if (!$insertID) {
                $mysqliCon->rollback();
                throw new \Exception('insert a poll failure! no insert id return!');
            }

            foreach ($pollOptions as $key => $value) {
                $pollOptionModelVO = (new ModelUtil())->getPollOptionModelVO($key, $value, $insertID);
                $pollOptionModel->addNewPollOptions($pollOptionModelVO);
            }

            $mysqliCon->commit();
            $mysqliCon->close();
        } catch (\Exception $e) {

            $mysqliCon->rollback();
            throw new \Exception('insert a poll failure,some reason:'. $e->getMessage() );

        }


    }


}