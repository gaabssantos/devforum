<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {
    public function community() {
        $community = Container::getModel('Community');

        $community->__set('name', $_POST['name']);

        if (!$community->communityExists) {
            $community->save();
            header('Location: /?success=community');
        } else {
            header('Location: /?error=community_already_exists');
        }
    }
}

?>