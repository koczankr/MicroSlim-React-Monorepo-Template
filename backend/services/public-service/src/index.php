<?php

header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

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