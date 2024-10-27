<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {
    protected function initRoutes() {
        $routes['home'] = array(
            'route' => '/',
            'controller' => 'indexController',
            'action' => 'index',
        );

        $routes['access'] = array(
            'route' => '/acessar',
            'controller' => 'indexController',
            'action' => 'access',
        );

        $routes['register'] = array(
            'route' => '/register',
            'controller' => 'indexController',
            'action' => 'register',
        );

        $routes['login'] = array(
            'route' => '/login',
            'controller' => 'indexController',
            'action' => 'login',
        );

        $routes['logout'] = array(
            'route' => '/logout',
            'controller' => 'indexController',
            'action' => 'logout',
        );

        $routes['community'] = array(
            'route' => '/community',
            'controller' => 'appController',
            'action' => 'community',
        );

        $this->setRoutes($routes);
    }
}

?>