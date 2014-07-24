<?php

if (CURRENT_ENVIRONMENT == ENVIRONMENTS::LOCAL) {
    return new \Phalcon\Config(array(
        'database' => array(
            'adapter' => 'Mysql',
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'dbname' => 'business',
        ),
    ));
}
