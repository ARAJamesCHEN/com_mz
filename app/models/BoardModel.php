<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 2018/6/10
 * Time: 20:19
 */

namespace app\models;

use comphp\base\Model;

class BoardModel extends Model
{
    protected $table = 'Board';

    public function searchAllBoard()
    {

        $this->where([], []);

        $result = $this->model = $this->fetchByStmt();

        return $result;

    }
}