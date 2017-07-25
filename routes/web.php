<?php
/*
 * List of routes
 */

return [
    '/'     => ['MyController', 'index'],
    '/home' => ['MyController', 'home'],
    '/user' => ['MyController', 'user'],
    '/users' => ['MyController', 'users'],
    '/user-create' => ['MyController', 'user_create'],
    '/user-update' => ['MyController', 'user_update'],
    '/user-delete' => ['MyController', 'user_delete'],
];