<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/12
 * Time: 21:31
 */

namespace app\models\modelbusiness\modelRstBean;


use comphp\base\RstBean;

class BoardRstBean extends RstBean
{
    private $boardID;
    private $boardName;

    private $pollRstBeanCollection;

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


}