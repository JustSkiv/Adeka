<?php
/**
 * Created by Nikolay Tuzov
 */

use sk\core\Router;

session_start();

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/sk/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/sk/libs');
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/temp/cache');
define('LOG', dirname(__DIR__) . '/temp/log');
define('LAYOUT', 'main');
define("DEBUG", 1);

require '../vendor/sk/libs/helpers/DebugHelper.php';

/*spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    if (is_file($file)) {
        require_once $file;
    }
});*/
require_once '../vendor/autoload.php';

new \sk\core\App();

// Custom routes
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)?$', ['controller' => 'page']);
Router::add('^page/(?P<alias>[a-z-]+)?$', ['controller' => 'page', 'action' => 'view']);
//Router::add('^articles/?(?P<action>[a-z-]+)?$');

// General routes
Router::add('^admin$', ['controller' => 'main', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


Router::dispatch($query);