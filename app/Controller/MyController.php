<?php namespace App\Controller;

use App\Models\Users;
use App\{View, DB};

/**
 * Class MyController
 * @package App\Controller
 */
class MyController
{
    public function index($request)
    {
        //print_r($request->ura);
        $rest = [1,2,3];
        View::render('index', compact('request', 'rest'));
    }

    public function home()
    {
        echo "Home";
    }

    public function user($request)
    {
        $id = $request->id;

        $db = DB::connect()->query('SELECT * FROM users')->get();

        while($row = $db->fetch(\PDO::FETCH_ASSOC)) {
            echo $row['id'] . ' ' . $row['name'];
        }
    }

    public function users()
    {
        $users = Users::connect()->all();
        print_r($users);
    }
}
