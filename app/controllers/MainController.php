<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\base\View;

/**
 * Created by Nikolay Tuzov
 */
class MainController extends AppController
{
    public function actionIndex()
    {
//        \R::fancyDebug(true);
//        App::$app->getList();
        $model = new Main();asd();


        $windows = Main::findAll();

//        $windows = App::$app->cache->get('windows');
//        if (!$windows) {
//            $windows = Main::findAll();
//            App::$app->cache->set('windows', $windows, 3600 * 24);
//        }


        $menu = $this->menu;

        View::setMeta([
            'title' => 'Главная страница',
            'keywords' => 'Meta main keywords',
            'description' => 'Meta main description'
        ]);

        $this->setData(
            compact('windows', 'menu')
        );
    }

    public function actionTest()
    {
        if ($this->isAjax()) {
            $model = new Main();
            $window = \R::findOne('window', "id = {$_POST['id']}");


            $this->loadView('_test', compact('window'));

            $this->layout = false;
        }

    }

}