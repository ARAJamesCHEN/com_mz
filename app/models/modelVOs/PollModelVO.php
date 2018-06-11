<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 11/06/2018
 * Time: 12:12 PM
 */

namespace app\models\modelVOs;

class PollModelVO
{

    private $question;

    private $content;

    private $optionType;

    private $postNum;

    private $viewNum;

    private $postDate;

    private $boardID;

    private $userID;

    private $sys;

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
    public function getSys()
    {
        return $this->sys;
    }

    /**
     * @param mixed $sys
     */
    public function setSys($sys): void
    {
        $this->sys = $sys;
    }



}