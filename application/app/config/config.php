<?php

use Phalcon\Config;

defined('BASE_PATH') || define('BASE_PATH', getenv('BASE_PATH') ?: realpath(dirname(__FILE__) . '/../..'));
defined('APP_PATH') || define('APP_PATH', BASE_PATH . '/app');

return new Config(
    [
        'database'    => [
            'adapter'  => 'Mysql',
            'host'     => 'mysql',
            'username' => 'root',
            'password' => 'root',
            'dbname'   => 'technical_test_phalcon_app',
            'charset'  => 'utf8',
        ],
        'application' => [
            'appDir'         => APP_PATH . '/',
            'controllersDir' => APP_PATH . '/controllers/',
            'modelsDir'      => APP_PATH . '/models/',
            'migrationsDir'  => APP_PATH . '/migrations/',
            'viewsDir'       => APP_PATH . '/views/',
            'libraryDir'     => APP_PATH . '/library/',
            'baseUri'        => '/',
        ],
    ]
);
