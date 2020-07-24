<?php

$router = $di->getRouter();

// Define your routes here

$router->add(
    '/http-provider',
    [
        'controller' => 'httpProvider',
        'action'     => 'index',
    ]
);

$router->add(
    '/mysql-provider',
    [
        'controller' => 'mySqlProvider',
        'action'     => 'index',
    ]
);

$router->add(
    '/elasticsearch-provider',
    [
        'controller' => 'elasticSearchProvider',
        'action'     => 'index',
    ]
);

$router->add(
    '/',
    [
        'controller' => 'index',
        'action'     => 'index',
    ]
);

$router->handle($_SERVER['REQUEST_URI']);
