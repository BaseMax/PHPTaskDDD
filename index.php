<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Application\Application;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$app = new Application();



$app->router->get("tasks", "TaskController@index");

$app->router->get("tasks/{id}", "TaskController@show");

$app->router->post("tasks", "TaskController@create");

$app->router->delete("tasks/{id}", "TaskController@destroy");

$app->router->put("tasks/{id}", "TaskController@update");


$response = $app->run();

return $response;
