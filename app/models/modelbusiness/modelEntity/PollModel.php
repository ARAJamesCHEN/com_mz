<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 10:11 AM
 */

namespace app\models\modelbusiness\modelEntity;

use comphp\base\Model;
use app\models\modelbusiness\modelVOs\PollModelVO;

class PollModel extends Model
{

    protected $table = 'Poll';

    /**
     * pollID integer not null AUTO_INCREMENT,
     * question varchar(500) not null,
     * content varchar(2000),
     * optionType char(1) not null,
     * postNum integer,
     * viewNum integer,
     * postDate date,
     * boardID integer not null,
     * userID Integer not null,
     * sys char(1),
     * @param PollModelVO $pollModelVO
     * @return mixed
     */
    public function addNewPoll(PollModelVO $pollModelVO){

        if(!is_null($pollModelVO)){

            //var_dump($pollModelVO);

            $data = array();

            $data['question'] = $pollModelVO->getQuestion();
            $data['content'] = $pollModelVO->getContent();
            $data['optionType'] = $pollModelVO->getOptionType();
            $data['postNum'] = $pollModelVO->getPostNum();
            $data['viewNum'] = $pollModelVO->getViewNum();
            $data['postDate'] = $pollModelVO->getPostDate();
            $data['boardID'] = $pollModelVO->getBoardID();
            $data['userID'] = $pollModelVO->getUserID();
            $data['sys'] = $pollModelVO ->getSys();

            $result = $this->model = $this->add($data);

            return $result;

        }

    }

    public function searchPollByID($pollID){

        if(!empty($pollID) && is_numeric($pollID)){

            $whereArray = ['pollID=?'];
            $paramArray = [$pollID];
            $this->where($whereArray, $paramArray);
            $result = $this->model = $this->fetchByStmt();
            return $result;

        }

    }


}