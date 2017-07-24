<?php

namespace app\controllers;

use vendor\core\base\Controller;
use vendor\libs\helpers\DebugHelper;


/**
 * Created by Nikolay Tuzov
 */
class PostNew extends Controller
{
    public function before()
    {
        echo 'Post New - before!';
    }

    public function actionIndex()
    {
        DebugHelper::debug($this->route);

//        echo 'Post New - index!';
    }

    public function actionTest()
    {
        var_dump($_GET['page']);
//        echo 'Post New - test!';
    }

    public function actionTestNew()
    {
//        echo 'Post New - test new!';
    }
}