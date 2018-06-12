<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/11
 * Time: 18:01
 */

namespace app\models\modelbusiness\modelVOs;


class PollOptionModelVO
{

    private $pollOptionID;

    private $optionName;

    private $optionValue;

    private $votedNum;

    private $pollID;

    private $sys;

    /**
     * @return mixed
     */
    public function getPollOptionID()
    {
        return $this->pollOptionID;
    }

    /**
     * @param mixed $pollOptionID
     */
    public function setPollOptionID($pollOptionID): void
    {
        $this->pollOptionID = $pollOptionID;
    }

    /**
     * @return mixed
     */
    public function getOptionName()
    {
        return $this->optionName;
    }

    /**
     * @param mixed $optionName
     */
    public function setOptionName($optionName): void
    {
        $this->optionName = $optionName;
    }

    /**
     * @return mixed
     */
    public function getOptionValue()
    {
        return $this->optionValue;
    }

    /**
     * @param mixed $optionValue
     */
    public function setOptionValue($optionValue): void
    {
        $this->optionValue = $optionValue;
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
    public function setVotedNum($votedNum): void
    {
        $this->votedNum = $votedNum;
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