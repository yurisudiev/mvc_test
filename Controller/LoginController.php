<?php

/**
 * Class LoginController
 */
class LoginController
{

    /**
     * Renders login form
     */
    public function loginAction()
    {
        $view = new View('login.php');
        $view->render();
    }

    /**
     * Login form processing
     */
    public function loginPostAction()
    {
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'password');

        if (Auth::login($login, $password)) {
            header('Location: ./');
        } else {
            $view = new View('login.php');
            $view->render(['error' => true]);
        }
    }

    /**
     * Logout action
     */
    public function logoutAction()
    {
        Auth::logout();
        header('Location: ./');
    }
}