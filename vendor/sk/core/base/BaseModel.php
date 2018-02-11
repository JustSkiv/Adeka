<?php
/**
 * created by: Nikolay Tuzov
 */

namespace sk\core\base;

use sk\core\Db;
use Valitron\Validator;

abstract class BaseModel
{
//    protected $pdo;
    protected static $table;
    protected $pk = 'id';

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = Db::instance();
    }

    /**
     * find all records in model's table
     * @return array
     */
    public static function findAll()
    {
        return \R::findAll(static::$table);
    }


    /**
     * Load data to model
     *
     * @param $data
     */
    public function load($data)
    {
        foreach ($data as $name => $value) {
            if (isset($this->attributes[$name])) {
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    /**
     * Validate data
     *
     * @param $data
     * @return bool
     */
    public function validate($data)
    {
        $res = false;

        $v = new Validator($data);
        $v->rules($this->rules);

        if ($v->validate()) {
            $res = true;
        } else {
            $this->errors = $v->errors();
        }

        return $res;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    //Этот код был написан до подключения RedBean

//    /**
//     * Выполнение указанного SQL-запроса
//     * @param $sql
//     * @return bool
//     */
//    public function query($sql)
//    {
//        return $this->pdo->execute($sql);
//    }
//
//    /**
//     * Получение всех записей таблицы
//     * @return array
//     */
//    public function findAll()
//    {
//        $sql = "SELECT * FROM {$this->table}";
//
//        return $this->pdo->query($sql);
//    }
//
//    /**
//     * Получение одной записи по знанию поля
//     * @param $value
//     * @param string $field
//     * @return array
//     */
//    public function findOne($value, $field = '')
//    {
//        $field = $field ?: $this->pk;
//        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
//
//        return $this->pdo->query($sql, [$value]);
//    }
//
//    public function findBySql($sql, $params = [])
//    {
//        return $this->pdo->query($sql, $params);
//    }
//
//    public function findLike($str, $field, $table = '')
//    {
//        $table = $table ?: $this->table;
//        $sql = "SELECT * FROM $table WHERE $field LIKE ?";
//
//        return $this->pdo->query($sql, ['%' . $str . '%']);
//    }


}