<?php
namespace App;

class Config
{
    const DB_HOST = 'localhost';
    const IP = '127.0.0.1';
    const DB_NAME = 'demo';
    const USER = 'root';
    const PASS = '56099556';

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
}