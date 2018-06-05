<?php

namespace comphp\db;

include('MySQLDB.php');

class Db
{

    private static $db = null;

    public static function getDB(){

        if (self::$db !== null) {
            return self::$db;
        }

        $host = DB_HOST ;
        $dbUser = DB_USER;
        $dbPass = DB_PASS;
        $dbName = DB_NAME;

        self::$db = new MySQL( $host, $dbUser, $dbPass, $dbName ) ;
        self::$db->selectDatabase();

        return self::$db;

    }
}



