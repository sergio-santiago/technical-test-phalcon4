<?php

$loader = new \Phalcon\Loader();

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
    ]
);

$loader->registerNamespaces(
    [
        'Phalcon\Http' => APP_PATH . '/library/Http/',
    ]
);

$loader->register();
