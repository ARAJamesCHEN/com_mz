<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 14/06/2018
 * Time: 9:47 AM
 */

namespace app\models\modelbusiness\modelHandler;
use app\models\modelInterface\PollOptionServiceImpl;

use comphp\base\Handler;
use comphp\base\RstBean;
use comphp\db\Db;

class PollOptionTransactionHandler extends Handler
{

    /**
     * @param $pollOptionIDCollection
     * @return RstBean
     * @throws \Exception
     */
    public function updatePollOptionsVotedNumByIDWithCollectionHandler($pollOptionIDCollection){

        if($pollOptionIDCollection){

            $rslt = new RstBean();

            $mysqliCon = Db::getDB()->getDbConnForStmt();
            try {
                //transation
                $mysqliCon->begin_transaction();
                foreach ($pollOptionIDCollection as $optionID) {
                    $rst = $this->callPollOptionService(new PollOptionServiceImpl())->updatePollOptionsVotedNumByID($optionID);

                    if (!$rst->isSuccess()) {
                        throw new \Exception('Fail to update the vote option:' . $optionID);
                    }

                }
                $mysqliCon->commit();
            } catch (\Exception $e) {

                $mysqliCon->rollback();
                throw new \Exception($e->getMessage() );

            }

            $rslt->setIsSuccess(true);

            //var_dump($rslt);

            return $rslt;


        }


    }

}