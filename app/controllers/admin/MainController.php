<?php
namespace app\controllers\admin;

use vendor\core\base\View;

/**
 * Created by Nikolay Tuzov
 */
class MainController extends AdminController
{

    public function actionIndex()
    {
        View::setMeta([
            'title' => 'Админка - главная',
//            'keywords' => 'Admin Meta main keywords',
//            'description' => 'Admin Meta main description'
        ]);

        echo 'Admin - index!2';
    }
    public function actionTest()
    {
        echo 'Admin - test!';
    }

}