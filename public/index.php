<?php

use DI\ContainerBuilder;
use IdNet\StackRunner\StackRunner;
use IdNet\Wafer\DefaultConfiguration;
use WaferExample\Configuration;
use Zend\Diactoros\Response\SapiEmitter;
use Zend\Diactoros\ServerRequestFactory;

require_once __DIR__.'/../vendor/autoload.php';

$response = (new ContainerBuilder)
    ->addDefinitions(DefaultConfiguration::getConfig())
    ->addDefinitions(Configuration::getConfig())
    ->build()
    ->get(StackRunner::class)
    ->process(ServerRequestFactory::fromGlobals());

(new SapiEmitter())->emit($response);
