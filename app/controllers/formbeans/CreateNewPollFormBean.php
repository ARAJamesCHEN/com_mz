<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 20:35
 */

namespace app\controllers\formbeans;
use comphp\base\FormBean;

class CreateNewPollFormBean extends FormBean
{
    private $boards;

    /**
     * @return mixed
     */
    public function getBoards()
    {
        return $this->boards;
    }

    /**
     * @param mixed $boards
     */
    public function setBoards($boards): void
    {
        $this->boards = $boards;
    }



}

class CreateNewPollFormBeanFactory
{
    public static function create()
    {
        return new CreateNewPollFormBean();
    }
}