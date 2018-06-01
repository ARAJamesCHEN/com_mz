<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 1/06/2018
 * Time: 7:35 PM
 */
namespace app\models;

use comphp\base\Model;
use comphp\db\Db;


class UserModel extends Model
{

    protected $table = 'UserInfo';

    public function search($keyword)
    {
        $sql = "select * from `$this->table` where `loginName` like :keyword";
        $sth = Db::getDB()->prepare($sql);
        $sth = $this->formatParam($sth, [':keyword' => "%$keyword%"]);
        $sth->execute();

        return $sth->fetchAll();
    }

}