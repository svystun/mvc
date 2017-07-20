<?php namespace App;

use PDO;
use App\Config;

/**
 * Class DB
 * @package App
 */
abstract class DB
{


    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            try {
                $settings = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME . ';charset=utf8';
                $db = new PDO($settings, Config::USER, Config::PASS);
            } catch (\PDOException $e) {
               echo $e->getMessage();
            }
        }
        return $db;
    }




}