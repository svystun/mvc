<?php namespace App\Controller;

use App\Models\Users;
use App\{View};

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

        $user = Users::connect()->find($id);
        print_r($user);
    }

    public function activated()
    {
        $users = Users::connect()->getActivatedUsers();
        print_r($users);
    }

    public function users()
    {
        $users = Users::connect()->all();
        print_r($users);
    }
}
