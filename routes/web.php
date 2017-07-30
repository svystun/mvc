<?php
/*
 * List of routes
 */

return [
    '/'     => ['MyController', 'index'],
    '/home' => ['MyController', 'home'],
    '/user' => ['MyController', 'user'],
    '/users' => ['MyController', 'users'],
    '/deploy' => ['MyController', 'deploy'],
    '/activated' => ['MyController', 'activated'],
    '/shop' => ['Shop', 'index'],
];