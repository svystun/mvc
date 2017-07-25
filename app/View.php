<?php namespace App;

/**
 * Class View
 * @package App
 */
class View
{
    public static function render( $view = '', $args)
    {
        $content = $view . '.tpl.php';
        if (is_array($args) && count($args))extract($args, EXTR_OVERWRITE);
        require('Views/layouts/master.tpl.php');
    }
}