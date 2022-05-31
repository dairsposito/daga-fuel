 <?php

$router->get('', 'PagesController@home');

$router->get('user', 'UsersController@index');
$router->post('user', 'UsersController@store');

$router->get('login', 'LoginController@index');
$router->post('login', 'LoginController@login');
$router->get('logout', 'LoginController@logout');
