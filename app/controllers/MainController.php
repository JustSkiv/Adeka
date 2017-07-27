<?php

namespace app\controllers;

use app\models\Main;
use vendor\libs\helpers\DebugHelper;

/**
 * Created by Nikolay Tuzov
 */
class MainController extends AppController
{
    public $layout = 'main';

    public function actionIndex()
    {
        $model = new Main();
        $windows = \R::findAll('window');

        $menu = $this->menu;
        $this->setData(
            compact('windows', 'menu')
        );
    }

}