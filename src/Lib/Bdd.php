<?php

namespace App\Lib;

use PDO;

class Bdd
{
    private static $db;

    public static function dbConnect()
    {

        $host = 'localhost';
        $dbname = 'bookCrossing';
        $username = 'admin';
        $password = 'test';


        if (empty(self::$db)) {

            $dsn = "mysql:host=$host; dbname=$dbname";

            $db = new PDO($dsn, $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->exec("SET NAMES 'utf8';");
        }
        return $db;
    }
}
