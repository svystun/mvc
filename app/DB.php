<?php namespace App;

use PDO;

/**
 * Class DB
 * @package App
 */
abstract class DB
{
    /**
     * @var null
     */
    private static $instance = null;
    private static $pdo = null;

    /**
     * @var array
     */
    private static $db = [
        'name' => 'bgcheck',
        'host' => '127.0.0.1',
        'user' => 'root',
        'pass' => 'root'
    ];

    /**
     * Connection to DB
     *
     * @return PDO|null
     */
    public static function connect() {

        if (self::$instance == null) {
            self::$instance = new PDO('mysql:host='.self::$db['host'].';dbname='.self::$db['name'], self::$db['user'], self::$db['pass']);
        }
        return self::$instance;
    }

    /**
     * Prevent cloning of the instance
     */
    private function __clone() {}

    /**
     * Prevent unserialize of the *Singleton*
     */
    private function __wakeup() {}

    /**
     * Prevent creating a new instance via the `new` operator from outside of this class.
     */
    private function __construct() {}

    public function all()
    {
        $sth = self::$instance->prepare("SELECT name, colour FROM fruit");
        $sth->execute();

        return $sth->fetchAll();
    }
}