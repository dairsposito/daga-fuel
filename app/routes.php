 <?php

$router->get('', 'PagesController@home', [App\Middleware\Auth::class]);

$router->get('user', 'UsersController@index', [App\Middleware\Auth::class]);
$router->get('user/create', 'UsersController@create', [App\Middleware\Guest::class]);
$router->post('user/create', 'UsersController@store', [App\Middleware\Guest::class]);
$router->get('user/update', 'UsersController@edit', [App\Middleware\Auth::class]);
$router->post('user/update', 'UsersController@update', [App\Middleware\Auth::class]);
$router->get('user/delete', 'UsersController@delete', [App\Middleware\Auth::class]);
$router->post('user/delete', 'UsersController@destroy', [App\Middleware\Auth::class]);

$router->get('login', 'LoginController@index', [App\Middleware\Guest::class]);
$router->post('login', 'LoginController@login', [App\Middleware\Guest::class]);
$router->get('logout', 'LoginController@logout', [App\Middleware\Auth::class]);

$router->get('fill-ups', 'FillUpController@index', [App\Middleware\Auth::class]);

$router->get('cars', 'CarController@index', [App\Middleware\Auth::class]);

$router->get('reports', 'ReportController@index', [App\Middleware\Auth::class]);
