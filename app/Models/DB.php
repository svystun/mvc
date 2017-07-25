<?php namespace App\Models;

use PDO;
use App\Config;

/**
 * Class DB
 * @package App
 */
class DB
{
    /**
     * @var null
     */
    protected static $pdo = null;
    protected static $table = 'users';

    /**
     * Connection to DB
     *
     * @return new static
     */
    public static function connect()
    {
        if (static::$pdo == null) {
            static::$pdo = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME,
                Config::USER,
                Config::PASS
            );
        }

        return new static();
    }

    public static function getDB()
    {
        static $db = null;
        if ($db === null) {
            try {

                $db = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME,
                    Config::USER,
                    Config::PASS
                );
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $db;
    }

    /**
     * Prevent cloning of the instance
     */
    private function __clone()
    {
    }

    /**
     * Prevent unserialize of the *Singleton*
     */
    private function __wakeup()
    {
    }

    /**
     * Prevent creating a new instance via the `new` operator from outside of this class.
     */
    private function __construct()
    {
    }

    public function all()
    {
        $db = self::$pdo;
        $stmt = $db->query('SELECT * FROM '. self::$table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}