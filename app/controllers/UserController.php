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
            $user->load($data, ['type' => User::LOAD_OPTION_HTMLSPECIALCHARS]);

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
        $success = $error = '';

        View::setMeta(['title' => 'Login']);
        if (!empty($_POST)) {
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';

            $userDao = new User();
            if ($userDao->login($login, $password)) {
                $success = 'Logged in succesfully';
            } else {
                $error = 'Login or password is incorrect';
            }

        }

        $this->setData(['success' => $success, 'error' => $error]);
    }

    public function actionLogout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        $this->redirect('/');
    }
}