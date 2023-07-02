<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->addErrorMiddleware(true, false, false);

$app->get('/', function (Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
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
	$BookingsController = new WhizzKids\Controller\BookingsController();
	$data = $BookingsController->getRegister();
	return $renderer->render($response, "register.phtml", $data);
});

$app->get('/accounts', function (Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
	$AccountsController = new WhizzKids\Controller\AccountsController();
	$data = $AccountsController->getAccounts();
	return $renderer->render($response, "accounts.phtml", $data);
});

$app->post('/accounts/new', function (Request $request, Response $response, array $args) {
	$data = $request->getParsedBody();
	if(!empty($data)) {
		$AccountsController = new WhizzKids\Controller\AccountsController();
		$new_account = $AccountsController->createAccount($data);
		if($new_account['success']) {
			$response->getBody()->write(json_encode($new_account));
			return $response;
		}
		$response->getBody()->write(json_encode($new_account));
		return $response->withStatus(507);
	}
	$response->getBody()->write(json_encode(['message' => 'Required data not received']));
	return $response->withStatus(422);
});

$app->get('/users', function (Request $request, Response $response, array $args) {
	$renderer = new PhpRenderer('src/views');
	$UserController = new WhizzKids\Controller\UserController();
	$data = $UserController->getUsers();
	return $renderer->render($response, "users.phtml", $data);
});

$app->run();