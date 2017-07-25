<?php namespace App\Controller;

use App\View;
use App\Models\DB;
use App\Models\Users;


/**
 * Class MyController
 * @package App\Controller
 */
class MyController
{
    public function index($request)
    {
        //print_r($request->ura);
        $rest = [1, 2, 3];
        View::render('index', compact('request', 'rest'));
    }

    public function home()
    {
        echo "Home";
    }

    public function user($request)
    {
        $id = $request->id;

        $User = Users::connect()
            ->getRowById($id);

        print_r($User);
    }

    public function user_create($request)
    {
        $id = $request->id;
        $name = $request->name;
        $email = $request->email;
        $company = $request->company;
        $params = compact('id', 'name', 'email', 'company');

        $User = Users::connect()
            ->insert($params);

//        $users = Users::connect()
//            ->all();

        //     print_r($users);
        print_r($User);

    }

    public function user_update($request)
    {
        $id = $request->id;

        $params = $request->params;
        //   print_r($request);
        //   print_r($id);
        //  print_r($params);
        Users::connect()
            ->update($id, $params);


    }

    public function user_delete($request)
    {
        $id = $request->id;

        //   print_r($request);
        //   print_r($id);
        //  print_r($params);
        Users::connect()
            ->delete($id);


    }

    public function users($request)
    {
        $users = Users::connect()
            ->all();
        //  print_r($users);
    }
}
