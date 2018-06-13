<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/12
 * Time: 20:14
 */
namespace app\models\modelbusiness\modelRstBean;

class PollOptionsRstBean extends \comphp\base\RstBean
{

    private $pollOptionID;

    private $optionName;

    private $optionValue;

    private $votedNum;

    private $pollID;

    private $votedPercentage;

    private $totalVotedNum;

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
    public function getVotedPercentage()
    {
        return $this->votedPercentage;
    }

    /**
     * @param mixed $votedPercentage
     */
    public function setVotedPercentage($votedPercentage): void
    {
        $this->votedPercentage = $votedPercentage;
    }



}