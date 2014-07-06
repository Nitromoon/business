<?php

namespace Business\Site;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\ModuleDefinitionInterface;


class Module implements ModuleDefinitionInterface
{

    /**
     * Registers the module auto-loader
     */
    public function registerAutoloaders()
    {

        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Business\Site\Controllers' => __DIR__ . '/controllers/',
            'Business\Site\Models' => __DIR__ . '/models/',
            'Business\Common\Services' => __DIR__.'/../common/services/'
        ));

        $loader->register();
    }

    /**
     * Registers the module-only services
     *
     * @param Phalcon\DI $di
     */
    public function registerServices($di)
    {

        /**
         * Read configuration
         */
        $config = include __DIR__ . "/config/config.php";

        /**
         * Setting up the view component
         */
        $di['view'] = function () use ($di, $config) {
            $view = new View();
            $view->setViewsDir($config->application->viewsDir);

            $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

            $volt->setOptions(
                array(
                    'compiledPath' => $config->volt->path,
                    'compiledExtension' => $config->volt->extension,
                    'compiledSeparator' => $config->volt->separator,
                    'stat' => (bool)$config->volt->stat,
                )
            );
            $view->registerEngines(array('.phtml' => $volt));

            return $view;
        };

        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            return new DbAdapter(array(
                "host" => $config->database->host,
                "username" => $config->database->username,
                "password" => $config->database->password,
                "dbname" => $config->database->name
            ));
        };

    }

}
