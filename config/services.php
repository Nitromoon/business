<?php

/**
 * Services are globally registered in this file
 */

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\DI\FactoryDefault;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Model\MetaData\Apc as ApcMetaData,
    Phalcon\Mvc\Model\MetaData\Strategy\Annotations as StrategyAnnotations;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

/**
 * Registering a router
 */
$di['router'] = function () {

    $router = new Router();

    $router->setDefaultModule("site");
    $router->setDefaultNamespace("Business\Site\Controllers");

    return $router;
};

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di['url'] = function () {
    $url = new UrlResolver();
    $url->setBaseUri('/');

    return $url;
};

/**
 * Start the session the first time some component request the session service
 */
$di['session'] = function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
};

$di['modelsMetadata'] = function() {

    // Instantiate a meta-data adapter
    $metaData = new ApcMetaData(array(
        "lifetime" => 86400,
        "prefix"   => "my-prefix"
    ));

    //Set a custom meta-data database introspection
    $metaData->setStrategy(new StrategyAnnotations());

    return $metaData;
};


/** Register custom services here */
$di['news'] = function ()
{
    $news = new Business\Common\Services\News();
    return $news;
};