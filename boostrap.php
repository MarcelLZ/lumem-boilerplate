<?php

require 'vendor/autoload.php';

define('BASE_PATH', __DIR__);

$app = new Laravel\Lumen\Application(
  realpath(BASE_PATH)
);

$app->router->group([
  'namespace' => 'App\Http\Controllers',
], function ($router) {
  require BASE_PATH . '/modules/routes.php';
});

$app->run();
