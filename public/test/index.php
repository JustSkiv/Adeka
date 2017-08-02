<?php
/**
 * Created by Nikolay Tuzov
 */

class Registry
{
    public static $objects = [];

    protected static $instance;

    protected function __construct()
    {

    }

    /**
     * Получение ссылки на подключение к БД
     * @return Registry
     */
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}