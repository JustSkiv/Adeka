<?php
/**
 * created by: Nikolay Tuzov
 */

namespace vendor\core\base;


abstract class Controller
{
    public $route = [];
    public $view;

    /**
     * Controller constructor.
     * @param array $route
     */
    public function __construct(array $route)
    {
        $this->route = $route;

        $this->view = $this->route['action'];
        include APP . DIRECTORY_SEPARATOR . "views" . DIRECTORY_SEPARATOR .
            $this->route['controller'] . DIRECTORY_SEPARATOR .
            $this->route['action'] . ".php";
    }

}