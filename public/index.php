<?php
/**
 * Created by Nikolay Tuzov
 */

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');

//require '../vendor/core/Router.php';
require '../vendor/libs/helpers/DebugHelper.php';
//require '../app/controllers/Main.php';
//require '../app/controllers/Post.php';
//require '../app/controllers/PostNew.php';

spl_autoload_register(function ($class) {
    DebugHelper::debug($class);
    $file = ROOT . '/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//    $file = APP . "/controllers/$class.php";
    if (is_file($file)) {
        require_once $file;
    }
});

//Добавляемые маршруты
Router::add('^articles/?(?P<action>[a-z-]+)?$', ['controller' => 'Post']);
//Router::add('^articles/?(?P<action>[a-z-]+)?$');

// Общие маршруты
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//DebugHelper::debug(Router::getRoutes());

Router::dispatch($query);