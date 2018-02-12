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

    public function save()
    {
        $this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_DEFAULT);
        $tbl = \R::dispense(static::$table);
        foreach ($this->attributes as $name => $value) {
            $tbl[$name] = $value;
        }

        return \R::store($tbl);
    }

    public function isUnique()
    {
        $res = true;

        $user = \R::findOne('user', 'login = ? OR email = ? LIMIT 1',
            [$this->attributes['login'], $this->attributes['email']]);

        if ($user) {
            $res = false;

            if ($user->login = $this->attributes['login']) {
                $this->errors['login'][] = 'This login already exists';
            }

            if ($user->email = $this->attributes['email']) {
                $this->errors['email'][] = 'This email already exists';
            }
        }

        return $res;
    }

    public function validate($data)
    {
        $res = parent::validate($data);

        if ($res) {
            $res = $this->isUnique();
        }

        return $res;
    }

    public function login($login, $password)
    {
        $res = false;
        $user = self::findOne('login = ? LIMIT 1', $login);
        if ($user) {
            if (password_verify($password, $user->password)) {
                foreach ($user as $k => $v) {

                    //TODO: should be instanse of User
                    $_SESSION['user'] = $user;
                    unset($_SESSION['user']['password']);
                }

                $res = true;
            }
        }

        return $res;
    }
}