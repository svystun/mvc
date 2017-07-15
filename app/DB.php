<?php namespace App;


/**
 * Class DB
 * @package App
 */
class DB
{
    const IP = '127.0.0.1';
    const DB_NAME = 'demo';
    const USER = 'root';
    const PASS = 'root';

    public static $connections = [
        'mysqli' => [
            'IP' => '127.0.0.2'
            //
            //
        ],
        'mysql' => [
            //
            //
            //
        ]
    ];

    private static $_instances = [];

    final private function __construct () {}
    final private function __clone() {}
    final private function __wakeup() {}

    final public static function getInstance() {
        $className = get_called_class();
        self::$_instances[$className] = self::$_instances[$className] ?? new static();
        return self::$_instances[$className];
    }

    public static function connect(string $view = '', $args)
    {


        $content = $view . '.tpl.php';
        if (is_array($args) && count($args))extract($args, EXTR_OVERWRITE);
        require('Views/layouts/master.tpl.php');
    }



}