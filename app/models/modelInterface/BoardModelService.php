<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 12/06/2018
 * Time: 11:55 AM
 */

namespace app\models\modelInterface;


interface BoardModelService
{

    /**
     * @return mixed
     */
    public function searchAllBoard();

    public function searchBoardByID($boardID);

}