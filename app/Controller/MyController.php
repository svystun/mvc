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
        $currentUser = \App\Models\Users::getUserByID($id);
        View::render('user', compact('request', 'id','currentUser'));


    }

    public function users($request)
    {
       // print_r($request);
      //  echo "USERS";
        $users = \App\Models\Users::getAll();
        View::render('users', compact('request', 'users'));
    }

    public function user_create($request)
    {
        // print_r($request);
        //  echo "USERS";
        $users = \App\Models\Users::getAll();
        View::render('user-create', compact('request', 'users'));
    }
}
