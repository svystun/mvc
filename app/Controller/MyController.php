<?php namespace App\Controller;

use App\View;

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

        // SQL: SELECT * FROM users WHERE id = :id

        $user = DB::connect('mysql')->query('SELECT * FROM users WHERE id = :id');


    }
}
