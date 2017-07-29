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
    protected static $instance = null;

    /**
     * @var null
     */
    protected $db = null;

    /**
     * @var null
     */
    protected $table = null;

    /**
     * @var array
     */
    private static $conf = [
        'name' => 'demo',
        'host' => '127.0.0.1',
        'user' => 'root',
        'pass' => 'root'
    ];

    /**
     * Connection to DB
     *
     * @return null|static
     */
    public static function connect() {

        if (is_null(self::$instance)) {
            $instance = new static();
            $instance->setDB();
            self::$instance = $instance;
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

    /**
     * Set database connection
     */
    public function setDB()
    {
        if (is_null($this->db)) {
            $pdo = new PDO('mysql:host='.self::$conf['host'].';dbname='.self::$conf['name'], self::$conf['user'], self::$conf['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $pdo;
        }
    }

    /**
     * Get all data from table
     *
     * @param int $type
     * @return mixed
     */
    public function all($type = PDO::FETCH_OBJ)
    {
        $sth = $this->db->prepare(sprintf("SELECT * FROM %s", $this->table));
        $sth->execute();

        return $sth->fetchAll($type);
    }

    /**
     * Execute SELECT query
     *
     * @param string $sql
     * @param int $type
     * @return mixed
     */
    public function query($sql = '', $type = PDO::FETCH_OBJ)
    {
        $sth = $this->db->prepare($sql);
        $sth->execute();

        return $sth->fetchAll($type);
    }

    /**
     * Find by id
     *
     * @param int $id
     * @param int $type
     * @return mixed
     */
    public function find(int $id = 0, $type = PDO::FETCH_OBJ)
    {
        $sth = $this->db->prepare(sprintf("SELECT * FROM %s WHERE id = :id", $this->table));
        $sth->execute(['id' => $id]);

        return $sth->fetch($type);
    }
}