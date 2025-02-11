<?php
require __DIR__ . '/../vendor/autoload.php';
use Slim\Factory\AppFactory;

$app = AppFactory::create();

// Private Service útvonal
$app->get('/api/private', function ($request, $response) {
    $response->getBody()->write(json_encode(["message" => "Private Service is working!"]));
    return $response->withHeader('Content-Type', 'application/json');
});

// Middleware-ek hozzáadása
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->run();