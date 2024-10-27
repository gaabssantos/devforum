<?php

namespace App\Models;

use MF\Model\Model;

class Community extends Model {
    private $name;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function communityExists() {
        $query = "select * from tb_communities where name = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('name'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save() {
        $query = "insert into tb_communities (name) values (?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('name'));
        $stmt->execute();
    }

    public function getAllCommunities() {
        $query = "select name from tb_communities";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>