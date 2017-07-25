<?php namespace App\Controller;

use App\View;
use App\Models\DB;


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

        $db = DB::connect()->all();

        while($row = $db->fetch(\PDO::FETCH_ASSOC)) {
            echo $row['id'] . ' ' . $row['name'];
        }
    }

    public function users($request)
    {
        $users =  \App\Models\Users::connect()->all();
        print_r($users);
    }
}
