<?php
/**
 * Created by PhpStorm.
 * User: yac0105
 * Date: 1/06/2018
 * Time: 7:35 PM
 */
namespace app\models\modelbusiness\modelEntity;

use comphp\base\Model;


class UserModel extends Model
{

    protected $table = 'UserInfo';

    public function searchUsrInfoByLoginName($keyword)
    {
		
		$whereArray = ['loginName=?'];
		
		$paramArray = [$keyword];

		$this->where($whereArray, $paramArray);
		
		$result = $this->model = $this->fetchByStmt();

		//var_dump($result);

		return $result;

    }

}

