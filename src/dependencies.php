<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

//database
$container['dbConnection'] = function ($c) {
    $settings = $c->get('settings')['db'];
    $db = new PDO($settings['host'].$settings['dbName'], $settings['userName']);

    return $db;
};

//random quote controller
$container['RandomQuoteController'] = new API\Factory\RandomQuoteControllerFactory();

//quote by Id controller
$container['QuoteByIdController'] = new API\Factory\QuoteByIdControllerFactory();

//quote model
$container['QuoteModel'] = new API\Factory\QuoteModelFactory();

//character Model
$container['CharacterModel'] = new API\Factory\CharacterModelFactory();

//Quotes by character controller
$container['QuotesByCharacterController'] = new API\Factory\QuotesByCharacterControllerFactory();