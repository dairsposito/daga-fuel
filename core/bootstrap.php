<?php

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};
use App\Models\Model;

App::bind('config', require 'config.php');

App::bind('APP_NAME', App::get('config')['APP_NAME']);

App::bind('database', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));

Model::setDb(App::get('database'));