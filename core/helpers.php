<?php

use \App\Core\App;

/**
 * Require a view.
 *
 * @param  string $view
 * @param  array  $data
 */
function view($view, $data = [])
{
    extract($data);

    return require "app/views/{$view}.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param  string $path
 */
function redirect($path)
{
    header("Location: /{$path}");
}

/**
 * Dump the application
 *
 * @param mixed $data
 * @param boolean $condition
 * @return void
 */
function dd($data, $condition = true)
{
    if ($condition) {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}