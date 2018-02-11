<?php

namespace app\controllers;

use app\models\Main;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use sk\core\base\View;

/**
 * Created by Nikolay Tuzov
 */
class MainController extends AppController
{
    public function actionIndex()
    {
//        \R::fancyDebug(true);
//        App::$app->getList();
        $model = new Main();
//        asd();
//        echo $asd;
//trigger_error("E_USER_ERROR!", E_USER_ERROR);
        $windows = Main::findAll();

//        $windows = App::$app->cache->get('windows');
//        if (!$windows) {
//            $windows = Main::findAll();
//            App::$app->cache->set('windows', $windows, 3600 * 24);
//        }


        // create a log channel
        $log = new Logger('test');
        $log->pushHandler(new StreamHandler(LOG . '/your.log', Logger::WARNING));

        // add records to the log
        $log->warning('Foo');
        $log->error('Bar');

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