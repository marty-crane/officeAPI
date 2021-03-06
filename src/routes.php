<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/api/quote', 'RandomQuoteController');
$app->get('/api/quote/{id}', 'QuoteByIdController');
$app->get('/api/character/{character}', 'QuotesByCharacterController');

$app->post('api/character/{apiKey}','AddCharacterController');