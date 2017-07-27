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

//        $windows = $model->findAll();
//        $windowTest = $model->findOne(16);
//        $data = $model->findBySql("SELECT * FROM {$model->table} ORDER BY id ASC ");
        $data = $model->findLike('2', 'title');
        DebugHelper::debug($data);

        $this->setData([
            'title' => 'Main page title',
        ]);
    }

}