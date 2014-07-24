<?php
$dbConfig = include __DIR__.'/../../common/config/database.config.php';
return new \Phalcon\Config(array(
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir' => __DIR__ . '/../../common/models/',
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
