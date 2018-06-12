<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 11:13 AM
 */

namespace comphp\base;


class RstBean
{

    private $isSuccess = false;

    private $result;

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @param bool $isSuncess
     */
    public function setIsSuccess($isSuncess)
    {
        $this->isSuccess = $isSuncess;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }



}