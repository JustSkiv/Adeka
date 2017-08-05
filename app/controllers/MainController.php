<?php

namespace app\controllers;

use app\models\Main;
use vendor\core\App;

/**
 * Created by Nikolay Tuzov
 */
class MainController extends AppController
{
    public function actionIndex()
    {
        \R::fancyDebug(true);
        App::$app->getList();
        $model = new Main();


//        $windows = \R::findAll('window');
//        echo date('Y-m-d H:i', time());
//        echo '<br />';
//        echo date('Y-m-d H:i', 1502027605);

        $windows = App::$app->cache->get('windows');

        if (!$windows) {
            $windows = Main::findAll();
            App::$app->cache->set('windows', $windows, 3600 * 24);
        }


        $menu = $this->menu;
        $this->setMeta([
            'keywords' => 'Meta main keywords',
            'description' => 'Meta main description'
        ]);
        $meta = $this->meta;

        $this->setData(
            compact('windows', 'menu', 'meta')
        );
    }

    public function actionTest()
    {

    }

}