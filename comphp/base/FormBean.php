<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 19:54
 */

namespace comphp\base;


class FormBean
{

    private $usrId;

    private $hasError = false;

    private $warning;

    /**
     * @return mixed
     */
    public function getUsrId()
    {
        $this->usrId = $_SESSION[ 'userID' ];
        return $this->usrId;
    }

    /**
     * @param mixed $usrId
     */
    public function setUsrId($usrId)
    {
        $this->usrId = $usrId;
    }


    /**
     * @return bool
     */
    public function isHasError(): bool
    {
        return $this->hasError;
    }

    /**
     * @param bool $hasError
     */
    public function setHasError(bool $hasError): void
    {
        $this->hasError = $hasError;
    }


    /**
     * @return mixed
     */
    public function getWarning()
    {
        return $this->warning;
    }

    /**
     * @param mixed $warning
     */
    public function setWarning($warning): void
    {
        $this->warning = $warning;
    }
}