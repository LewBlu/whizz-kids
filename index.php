<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, false, false);

$app->get('/', function (Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
    // $name = $args['name'];
    // $response->getBody()->write("Hello");
    // return $response;
	return $renderer->render($response, "landing.phtml");
});

$app->run();