<?php namespace App\Models;

use App\DB;

/**
 * Class Users
 * @package App\Models
 */
class Users extends DB
{
    protected $table = 'users';

    public function getActivatedUsers()
    {
        $conn = $this->db->query("SELECT * FROM users WHERE activated = 0");

        return $conn->fetch(\PDO::FETCH_OBJ);
    }
}