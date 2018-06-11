<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 10:11 AM
 */

namespace app\models;

use comphp\base\Model;
use app\models\modelVOs\PollModelVO;

class PollModel extends Model
{

    protected $table = 'Poll';

    public function addNewPoll(PollModelVO $pollModelVO){

        if(!$pollModelVO){



        }

    }


}