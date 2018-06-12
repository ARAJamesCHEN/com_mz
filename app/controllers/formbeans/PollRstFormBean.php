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

    private $boardName;

    private $question;

    private $usrName;

    private $usrPostNum;

    private $postDate;

    private $votedNum;

    private $options;

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

    /**
     * @return mixed
     */
    public function getBoardName()
    {
        return $this->boardName;
    }

    /**
     * @param mixed $boardName
     */
    public function setBoardName($boardName)
    {
        $this->boardName = $boardName;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getUsrName()
    {
        return $this->usrName;
    }

    /**
     * @param mixed $usrName
     */
    public function setUsrName($usrName)
    {
        $this->usrName = $usrName;
    }

    /**
     * @return mixed
     */
    public function getUsrPostNum()
    {
        return $this->usrPostNum;
    }

    /**
     * @param mixed $usrPostNum
     */
    public function setUsrPostNum($usrPostNum)
    {
        $this->usrPostNum = $usrPostNum;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->postDate;
    }

    /**
     * @param mixed $postDate
     */
    public function setPostDate($postDate)
    {
        $this->postDate = $postDate;
    }

    /**
     * @return mixed
     */
    public function getVotedNum()
    {
        return $this->votedNum;
    }

    /**
     * @param mixed $votedNum
     */
    public function setVotedNum($votedNum)
    {
        $this->votedNum = $votedNum;
    }

    /**
     * @return mixed
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param mixed $options
     */
    public function setOptions($options)
    {
        $this->options = $options;
    }



}

class PollRstFormBeanFactory
{
    public static function create()
    {
        return new PollRstFormBean();
    }
}