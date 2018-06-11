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
    private $hasError = false;

    private $warning;


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