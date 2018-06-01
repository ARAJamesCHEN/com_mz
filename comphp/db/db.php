<?php

namespace comphp\db;


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

        $db = new MySQL( $host, $dbUser, $dbPass, $dbName ) ;
        $db->selectDatabase();



        return $db;

    }
}



