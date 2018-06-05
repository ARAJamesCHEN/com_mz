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
        $sql = "select userID,uFirstName from $this->table where loginName=?";


        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //$sth = $this->prepare($sql);
        //$sth = $this->bindParam($sth, [$keyword]);
       // $sth =  $this->execute($sth);
        //$sth =  $this->bindStmtRst($sth);
        //$sth =  $this->fetchStmtRst($sth);


        if ($stmt = mysqli_prepare($link, $sql)) {

            /* bind parameters for markers */
            mysqli_stmt_bind_param($stmt, "s", $keyword);

            /* execute query */
            mysqli_stmt_execute($stmt);

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $userID,$uFirstName);

            /* fetch value */
            mysqli_stmt_fetch($stmt);

            echo "Niubi:".$userID.'--OFL'.$uFirstName;

            /* close statement */
            mysqli_stmt_close($stmt);
        }

        mysqli_close($link);

    }

}