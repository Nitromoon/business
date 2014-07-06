<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'test',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' => __DIR__ . '/../models/',
        'viewsDir' => __DIR__ . '/../views/',
        'baseUri' => '/business/'
    ),
    'volt' => array(
        'path' => __DIR__ . '/../volt/',
        'extension' => 'compiled',
        'separator' => '%%',
        'stat' => 1
    )
));
