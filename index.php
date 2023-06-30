<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

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

$app->get('/accounts', function (Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
	$AccountsController = new WhizzKids\Controller\AccountsController();
	$data = $AccountsController->getAccounts();
	return $renderer->render($response, "accounts.phtml", $data);
});

$app->get('/users', function (Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
	$UserController = new WhizzKids\Controller\UserController();
	$data = $UserController->getUsers();
	return $renderer->render($response, "users.phtml", $data);
});

$app->run();