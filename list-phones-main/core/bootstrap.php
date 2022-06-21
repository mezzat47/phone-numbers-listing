<?php

use App\Core\App;
use App\Core\Helpers\{Connection, QueryBuilder};

App::bind('config', require '../config.php');
App::bind('database', new QueryBuilder(Connection::make(App::get('config')['database'])));
App::bind('validators', App::get('config')['validators']);
