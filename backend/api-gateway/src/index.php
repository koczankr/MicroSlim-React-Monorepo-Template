<?php
require __DIR__ . '/../vendor/autoload.php';
use Slim\Factory\AppFactory;

$app = AppFactory::create();

// API Gateway teszt útvonal
$app->get('/api/hello', function ($request, $response) {
    $response->getBody()->write(json_encode(["message" => "Hello from API Gateway!"]));
    return $response->withHeader('Content-Type', 'application/json');
});

// Middleware-ek (ajánlott)
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->run();