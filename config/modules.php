<?php

/**
 * Register application modules
 */
$application->registerModules(array(
    'site' => array(
        'className' => 'Business\Site\Module',
        'path' => __DIR__ . '/../apps/site/Module.php'
    )
));
