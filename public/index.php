<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;

require __DIR__ . '/../vendor/autoload.php';
require_once './controllers/UsuarioController.php';
require_once './db/AccesoDatos.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = AppFactory::create();
$app->setBasePath('/public');
$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
  $response->getBody()->write("hola alumnos de los lunes!");
  return $response;
});

// peticiones
$app->group('/usuarios', function (RouteCollectorProxy $group) {
  $group->get('[/]', \UsuarioController::class . ':TraerTodos');
  $group->get('/{usuario}', \UsuarioController::class . ':TraerUno');
  $group->post('[/]', \UsuarioController::class . ':CargarUno');
  $group->put('/{usuario}', \UsuarioController::class . ':ModificarUno');
  $group->delete('/{usuario}', \UsuarioController::class . ':BorrarUno');
  $group->post('/login', \UsuarioController::class . ':Login');
});

// Run app
$app->run();
