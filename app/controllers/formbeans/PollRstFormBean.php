<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 4:37 PM
 */

namespace app\controllers\formbeans;


use comphp\base\FormBean;

class PollRstFormBean extends FormBean
{

    private $pollId;

    /**
     * @return mixed
     */
    public function getPollId()
    {
        return $this->pollId;
    }

    /**
     * @param mixed $pollId
     */
    public function setPollId($pollId)
    {
        $this->pollId = $pollId;
    }



}

class PollRstFormBeanFactory
{
    public static function create()
    {
        return new PollRstFormBean();
    }
}