<?php
/**
 * created by: Nikolay Tuzov
 */

namespace vendor\core;


class Db
{
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct()
    {
        $db = require ROOT . '/config/config_db.php';
        error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Выполнение указанного SQL-запроса
     * @param $sql
     * @param $params
     * @return bool
     */
    public function execute($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }


    /**
     *  Получение данных из БД по указанному SQL-запросу
     * @param $sql
     * @param $params
     * @return array
     */
    public function query($sql, $params = [])
    {
        self::$countSql++;
        self::$queries[] = $sql;

        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute($params);
        if ($result !== false) {
            return $stmt->fetchAll();
        }

        return [];
    }
}