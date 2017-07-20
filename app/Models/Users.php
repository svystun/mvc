<?php
namespace App\Models;

use PDO;

class Users extends \App\DB
{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function addUser($name,$email,$role= 'editor')
    {
        $db = static::getDB();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO users (name,email,role) values(?, ?, ?)";
        $q = $db->prepare($sql);
        $q->execute(array($name,$email,$role));

    }

    public static function getUserByID($id)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM users WHERE id ='. $id);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function deleteUserByID($id)
    {
        $db = static::getDB();
        $stmt = $db->exec('DELETE FROM users WHERE id ='. $id);
    }

}