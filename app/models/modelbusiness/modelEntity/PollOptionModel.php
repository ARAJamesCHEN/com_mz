<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/11
 * Time: 17:58
 */

namespace app\models\modelbusiness\modelEntity;


use comphp\base\Model;
use app\models\modelbusiness\modelVOs\PollOptionModelVO;
class PollOptionModel extends Model
{

    protected $table = 'PollOption';

    /**
     * pollOptionID integer not null AUTO_INCREMENT,
       optionName varchar(200) not null,
       optionValue varchar(50) not null,
       votedNum integer,
       pollID integer not null,
       sys char(1),
       constraint PK_PollOption primary key(pollOptionID),
       constraint FK_PPollID foreign key(pollID)  references Poll(pollID)
     */
    public function addNewPollOptions(PollOptionModelVO $pollOptionModelVO){

        if(!is_null($pollOptionModelVO)){

            $data = array();

            $data['optionName'] = $pollOptionModelVO->getOptionName();
            $data['optionValue'] = $pollOptionModelVO->getOptionValue();
            $data['votedNum'] = $pollOptionModelVO->getVotedNum();
            $data['pollID'] = $pollOptionModelVO->getPollID();
            $data['sys'] = $pollOptionModelVO->getSys();

            $result = $this->model = $this->add($data);

            return $result;

        }

    }

    /**
     * @param $pollID
     * @return mixed
     */
    public function searchPollOptionsByPollID($pollID){

        if(!is_null($pollID)){
            $whereArray = ['pollID=?'];
            $paramArray = [$pollID];
            $this->where($whereArray, $paramArray);
            $result = $this->model = $this->fetchByStmt();
            return $result;
        }

    }

    /**
     * @param $pollOptionID
     * @return mixed
     */
    public function searchPollOptionsVotedPercentageByID($pollOptionID){

        if(!is_null($pollOptionID)){
            $whereArray = ['pollOptionID=?'];
            $paramArray = [$pollOptionID];
            $this->where($whereArray, $paramArray);

            $fields1=['pollOptionID','votedNum','T.TotalVote', 'FORMAT((votedNum/T.TotalVote) * 100,2)'];
            $as1 = ['','','','PercentageOfVote'];
            $selectField1 = $this->selectFields($fields1,$as1);

            //echo $selectField1;

            $sql1 = $this->getSelectScript($selectField1);

            //echo 'sql1:'.$sql1.'<br>';

            $fields2=['pollID','sum(votedNum)'];
            $as2 = ['','TotalVote'];
            $selectField2 = $this->selectFields($fields2,$as2);
            $sql2 = $this->getSelectScript($selectField2);
            $group = ['pollID'];
            $sql2 = $this->group($sql2,$group);
            //echo 'sql2:'.$sql2.'<br>';

            $sqls = [$sql1,$sql2];
            $as3 = ['','T'];
            $on = ['PollOption.pollID','T.pollID'];

            $querySql = $this->innerJoin($sqls, $as3, $on);
            //echo '$querySql:'.$querySql.'<br>';

            $result = $this->model = $this->fetchInnerJoinQuery($querySql);
            return $result;
        }

    }

    public function searchPollOptionsByID($pollOptionID){
        $whereArray = ['pollOptionID=?'];
        $paramArray = [$pollOptionID];
        $this->where($whereArray, $paramArray);

        $result = $this->model = $this->fetchByStmt();

        return $result;
    }

    public function updatePollOptionsVotedNumByID($pollOptionID){
        $origNum = 0;

        $result = $this->searchPollOptionsByID($pollOptionID);

        while($aRow = $result->fetch() ){
            $origNum = $aRow['votedNum'];

            if(is_null($origNum)){
                $origNum = 0;
            }
        }

        //var_dump($origNum);

        $data = array('votedNum'=> (++$origNum));

        $whereArray = ['pollOptionID=?'];
        $paramArray = [$pollOptionID];
        $this->where($whereArray, $paramArray);

        $result = $this->model = $this->update($data);

        return $result;


    }

}