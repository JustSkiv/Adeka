<?php
/**
 * Created by Nikolay Tuzov
 */

require 'rb.php';
$db = require '../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass']);
R::freeze(true);
R::fancyDebug(TRUE);

//var_dump(R::testConnection());

//Create
//$category = R::dispense('category');
//$category->title = 'Категория sadadsads';
//$id = R::store($category);

//Read and Update
//$category = R::load('category',3);
//var_dump($category->title);
//$category->title = 'Категория №2';
//R::store($category);
//var_dump($category->title);

//Delete
//$category = R::load('category',6);
//R::trash($category);