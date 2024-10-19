<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {
    public function index() {
        $this->render('index');
    }

    public function access() {
        $this->render('access');
    }

    public function register() {
        $user = Container::getModel('User');

        $user->__set('email', $_POST['email']);
        $user->__set('password', md5($_POST['password']));
        $user->__set('confirmPassword', md5($_POST['confirmPassword']));

        if ($user->__get('password') == $user->__get('confirmPassword')) {
            if ($user->isValid()) {
                $user->save();
                header('Location: /acessar?register&success');
            } else {
                header('Location: /acessar?register&error=email_exists');
            }
        } else {
            header('Location: /acessar?register&error=password_not_match');
        }
    }
}

?>