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
        $errors = [];
        $success = '';
        View::setMeta(['title' => 'Signup']);

        $user = new User();
        if (!empty($_POST)) {
            $data = $_POST;
            $user->load($data, ['type' => User::LOAD_OPTION_HTMLSPECIALCHARS])  ;

            if ($user->validate($data) && $user->save()) {
                $success = 'Signed up successfully!';
            } else {
                $errors = $user->getErrors();
            }

        }

        $this->setData(['errors' => $errors, 'user' => $user, 'success' => $success]);
    }

    public function actionLogin()
    {

    }

    public function actionLogout()
    {

    }
}