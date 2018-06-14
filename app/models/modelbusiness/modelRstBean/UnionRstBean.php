<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 15/06/2018
 * Time: 9:50 AM
 */

namespace app\models\modelbusiness\modelRstBean;


use comphp\base\RstBean;

class UnionRstBean extends RstBean
{

    private $boardRstBean;

    private $usrRstBean;

    private $pollRstBeanCollection;

    /**
     * @return mixed
     */
    public function getBoardRstBean()
    {
        return $this->boardRstBean;
    }

    /**
     * @param mixed $boardRstBean
     */
    public function setBoardRstBean($boardRstBean): void
    {
        $this->boardRstBean = $boardRstBean;
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
    public function getPollRstBeanCollection()
    {
        return $this->pollRstBeanCollection;
    }

    /**
     * @param mixed $pollRstBeanCollection
     */
    public function setPollRstBeanCollection($pollRstBeanCollection): void
    {
        $this->pollRstBeanCollection = $pollRstBeanCollection;
    }



}