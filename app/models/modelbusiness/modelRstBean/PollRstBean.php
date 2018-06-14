<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/12
 * Time: 20:10
 */
namespace app\models\modelbusiness\modelRstBean;

use comphp\base\RstBean;

class PollRstBean extends RstBean
{
    private $pollID;

    private $question;

    private $content;

    private $optionType;

    private $optionTypeName;

    private $postNum;

    private $viewNum;

    private $postDate;

    private $postDateDisplay;

    private $boardID;

    private $boardName;

    private $totalVotedNum;

    private $userID;

    private $usrRstBean;

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }


    /**
     * @return mixed
     */
    public function getUsrRstBean()
    {
        return $this->usrRstBean;
    }

    /**
     * @param mixed $usrRstBean
     */
    public function setUsrRstBean($usrRstBean): void
    {
        $this->usrRstBean = $usrRstBean;
    }



    /**
     * @return mixed
     */
    public function getTotalVotedNum()
    {
        return $this->totalVotedNum;
    }

    /**
     * @param mixed $totalVotedNum
     */
    public function setTotalVotedNum($totalVotedNum): void
    {
        $this->totalVotedNum = $totalVotedNum;
    }

    /**
     * @return mixed
     */
    public function getOptionTypeName()
    {
        return $this->optionTypeName;
    }

    /**
     * @param mixed $optionTypeName
     */
    public function setOptionTypeName($optionTypeName): void
    {
        $this->optionTypeName = $optionTypeName;
    }

    /**
     * @return mixed
     */
    public function getPostDateDisplay()
    {
        return $this->postDateDisplay;
    }

    /**
     * @param mixed $postDateDisplay
     */
    public function setPostDateDisplay($postDateDisplay): void
    {
        $this->postDateDisplay = $postDateDisplay;
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
    public function setBoardName($boardName): void
    {
        $this->boardName = $boardName;
    }


    /**
     * @return mixed
     */
    public function getPollID()
    {
        return $this->pollID;
    }

    /**
     * @param mixed $pollID
     */
    public function setPollID($pollID): void
    {
        $this->pollID = $pollID;
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
    public function setQuestion($question): void
    {
        $this->question = $question;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content): void
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getOptionType()
    {
        return $this->optionType;
    }

    /**
     * @param mixed $optionType
     */
    public function setOptionType($optionType): void
    {
        $this->optionType = $optionType;
    }

    /**
     * @return mixed
     */
    public function getPostNum()
    {
        return $this->postNum;
    }

    /**
     * @param mixed $postNum
     */
    public function setPostNum($postNum): void
    {
        $this->postNum = $postNum;
    }

    /**
     * @return mixed
     */
    public function getViewNum()
    {
        return $this->viewNum;
    }

    /**
     * @param mixed $viewNum
     */
    public function setViewNum($viewNum): void
    {
        $this->viewNum = $viewNum;
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
    public function setPostDate($postDate): void
    {
        $this->postDate = $postDate;
    }

    /**
     * @return mixed
     */
    public function getBoardID()
    {
        return $this->boardID;
    }

    /**
     * @param mixed $boardID
     */
    public function setBoardID($boardID): void
    {
        $this->boardID = $boardID;
    }



}