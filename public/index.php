<?php

require_once "../vendor/autoload.php";

use Lok\CofeeBreaks\Controller\ErroController;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;
use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;

$rotas = require __DIR__ . "/../config/routes.php";
$caminho = $_SERVER['PATH_INFO'];


if (!array_key_exists($caminho, $rotas)) {
    $classeControladora = ErroController::class;
} else {
    $classeControladora = $rotas[$caminho];
}

session_start();


$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);
$request = $creator->fromGlobals();


/** @var ContainerInterface $container */
$container = require __DIR__ . '/../config/dependencies.php';

/** @var RequestHandlerInterface $controlador */
$controlador = $container->get($classeControladora);
$resposta = $controlador->handle($request);

foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $resposta->getBody();