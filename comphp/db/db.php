<?php

namespace comphp\db;

include(APP_PATH.'comphp/db/'.'MySQLDB.php');

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

        return self::$db;

    }
}



