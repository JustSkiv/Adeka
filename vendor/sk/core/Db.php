<?php
/**
 * created by: Nikolay Tuzov
 */

namespace sk\core;


use R;

class Db
{
    use TSingletone;

    protected $pdo;
    public static $countSql = 0;
    public static $queries = [];

    /**
     * Реализуем синглтон, поэтому конструктор protected
     * Db constructor.
     */
    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';

        // Подключаем RedBean
        require LIBS . '/rb.php';
        $db = require '../config/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['pass']);
        R::freeze(true);
//        R::fancyDebug(TRUE);
    }
}