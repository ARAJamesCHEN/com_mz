<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/11
 * Time: 17:58
 */

namespace app\models;


use comphp\base\Model;
use app\models\modelVOs\PollOptionModelVO;
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

}