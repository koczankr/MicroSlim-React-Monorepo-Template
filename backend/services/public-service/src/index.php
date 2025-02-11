<?php
require __DIR__ . '/../vendor/autoload.php';
use Slim\Factory\AppFactory;

$app = AppFactory::create();

// Public Service útvonal
$app->get('/api/public', function ($request, $response) {
    $response->getBody()->write(json_encode(["message" => "Public Service is working!"]));
    return $response->withHeader('Content-Type', 'application/json');
});

// Middleware-ek hozzáadása
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->run();