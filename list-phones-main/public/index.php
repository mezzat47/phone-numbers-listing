<?php

require '../vendor/autoload.php';
require '../core/bootstrap.php';

use App\Core\Helpers\{Router, Request};

Router::load('../src/routes.php')->direct(Request::uri(), Request::method());
