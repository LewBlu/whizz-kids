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

$app->get('/rota[/{date}]', function(Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
	$RotaController = new WhizzKids\Controller\RotaController();
	$date = (isset($args['date']) ? $args['date'] : null);
	$data = $RotaController->getCalendarConfiguration($date);
	return $renderer->render($response, "rota.phtml", $data);
});

$app->get('/register', function (Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
	$RegisterController = new WhizzKids\Controller\RegisterController();
	$data = $RegisterController->getRegister();
	return $renderer->render($response, "register.phtml", $data);
});

$app->run();