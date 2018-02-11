<?php
/**
 * created by: Nikolay Tuzov
 */

namespace app\models;

use sk\core\base\BaseModel;

class User extends BaseModel
{
    public static $table = 'user';

    public $attributes = [
        'login' => '',
        'password' => '',
        'email' => '',
        'name' => '',
    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['email'],
            ['name'],
        ],
        'email' => ['email'],
        'lengthMin' => [['password', 4]]
    ];

}