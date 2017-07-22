<?php

/**
 * Created by Nikolay Tuzov
 *
 * Вспомогательный класс
 */
class DebugHelper
{
    public static function debug($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }
}