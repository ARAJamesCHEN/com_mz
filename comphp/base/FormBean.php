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
    private $warning;

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