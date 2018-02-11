<?php
/**
 * created by: Nikolay Tuzov
 */

namespace app\controllers;


use app\models\User;
use sk\core\base\BaseController;
use sk\core\base\View;

class UserController extends BaseController
{
    public function actionSignup()
    {
        View::setMeta(['title' => 'Signup']);

        if (!empty($_POST)) {
            $user = new User();
            $data = $_POST;
            $user->load($data);

            if ($user->validate($data)) {
                echo "Ok\n";
            } else {
                var_dump($user->getErrors());
            }

            var_dump($user);
            var_dump($_POST);
        }
    }

    public function actionLogin()
    {

    }

    public function actionLogout()
    {

    }
}