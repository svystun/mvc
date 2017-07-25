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

    /**
     * @var null
     */
    protected static $table = null;

    /**
     * @var null
     */
    protected static $instance = null;

    /**
     * Connection to DB
     *
     * @return new
     */
    public static function connect()
    {
        if (static::$pdo == null) {
            static::$pdo = new PDO('mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME,
                Config::USER,
                Config::PASS
            );
        }

        return  self::$instance = new static();
    }

    /**
     *
     * RETURN new PDO
     * @return null|PDO
     */
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

    /**
     * Get all form table
     * @return array
     *
     */
    public function all()
    {
        $db = self::$pdo;
        $stmt = $db->query('SELECT * FROM ' . static::$table);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get row form table by ID
     * @param $id
     * @return mixed
     */
    public function getRowById($id)
    {
        $db = self::$pdo;
        $stmt = $db->query('SELECT * FROM ' . static::$table . ' WHERE id =' . $id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Insert new row in table
     * @param $parameters array
     */
    public function insert($parameters)
    {
        $table = static::$table;
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $statement = self::$pdo->prepare($sql);
            $statement->execute($parameters);
        } catch (\Exception $e) {
            //
        }
    }


    /**
     *
     * Update row in table
     * @param $id
     * @param $parameters
     */
    public function update($id, $parameters)
    {
        $pdo = self::$pdo;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $table = static::$table;
        $updateQuery = "";

        $keys = array_keys($parameters);
        $updateArr = array_values($parameters);


        foreach ($keys as $key) {
            $trim = trim($key, "'");

            // if last item dont put comma
            if ($key === end($keys)) {
                $updateQuery .= "{$trim}= ? ";
            } else {
                $updateQuery .= "{$trim}= ? ,";
            }

        }

        $updateArr[] = $id;

        $sql = sprintf(
            'UPDATE %s set %s WHERE id= ?',
            $table,
            $updateQuery

        );
        try {
            $statement = $pdo->prepare($sql);
            $statement->execute($updateArr);
        } catch (\Exception $e) {
            //
        }
    }

    /**
     * delete row by ID
     * @param $id
     */
    public function delete($id)
    {
        $pdo = self::$pdo;
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $table = static::$table;
        $sql = "DELETE FROM {$table}  WHERE id = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
    }


}