<?php

require_once 'vendor/autoload.php';
date_default_timezone_set('America/Bogota');

use Gestor\Controller\InventarioController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;


$app = AppFactory::create();
$app->setBasePath('/inventario');

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});
$app->group('/productos', function (RouteCollectorProxy $group) {
    $ic = new InventarioController();
    $group->get('', function ($request, $response, array $args) use ($ic) {
        $payload = $ic->read();
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json');

    });

    $group->post('', function ($request, $response, array $args) use ($ic) {
        $body = $request->getBody();
        $payload = $ic->create($body);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json');
    });

    $group->put('', function ($request, $response, array $args) use ($ic) {
        $body = $request->getBody();
        $payload = $ic->update($body);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json');
    });

    $group->delete('', function ($request, $response, array $args) use ($ic) {
        $body = $request->getBody();
        $payload = $ic->delete($body);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json');
    });

    $group->post('/vender', function ($request, $response, array $args) use ($ic) {
        $body = $request->getBody();
        $payload = $ic->sell($body);
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json');
    });
});

$app->run();