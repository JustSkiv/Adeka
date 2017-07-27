<?php
/**
 * Created by Nikolay Tuzov
 */

namespace app\controllers;


use app\models\Main;
use vendor\core\base\BaseController;

class AppController extends BaseController
{
    protected $menu;

    /**
     * AppController constructor.
     */
    public function __construct($route)
    {
        parent::__construct($route);

        new Main();
        $this->menu = \R::findAll('category');
    }
}