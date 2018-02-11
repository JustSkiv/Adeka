<?php
/**
 * Created by Nikolay Tuzov
 */

namespace app\controllers\admin;


use app\models\Main;
use sk\core\base\BaseController;

class AdminController extends BaseController
{
    public $menu;
    public $meta = [];
    public $layout = 'admin';

    /**
     * AppController constructor.
     */
    public function __construct($route)
    {
        parent::__construct($route);

//        new Main();
//        $this->menu = \R::findAll('category');
    }
}