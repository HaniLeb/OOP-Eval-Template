<?php

declare(strict_types=1);

use App\Exceptions\RouteNotFoundException;
use App\View;

require __DIR__.'/../../vendor/autoload.php';

$root = dirname(__DIR__).DIRECTORY_SEPARATOR;
define('VIEWS_PATH', $root.'../views'.DIRECTORY_SEPARATOR);

session_start();

try {
    $router = new \App\Router();

    $router->get('/', function () { echo 'Hello World !';});

    $router->get('/contest', [App\Controllers\ContestController::class, 'contest']);
    $router->get('/contest/create', [App\Controllers\ContestController::class, 'create']);
    $router->post('/contest/store', [App\Controllers\ContestController::class, 'store']);

    $router->get('/game', [App\Controllers\GameController::class, 'game']);
    $router->get('/game/create', [App\Controllers\GameController::class, 'create']);
    $router->post('/game/store', [App\Controllers\GameController::class, 'store']);

    $router->get('/player', [App\Controllers\PlayerController::class, 'player']);
    $router->get('/player/create', [App\Controllers\PlayerController::class, 'create']);
    $router->post('/player/store', [App\Controllers\PlayerController::class, 'store']);



    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (RouteNotFoundException $e) {
    
    http_response_code(404);
    $error = $e->getMessage();

    echo (new View('error/404', ['error' => $error]))->render();
}