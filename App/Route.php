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

        $this->setRoutes($routes);
    }
}

?>