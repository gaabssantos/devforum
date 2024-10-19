<?php

namespace App\Models;

use MF\Model\Model;

class User extends Model {
    private $email;
    private $password;
    private $confirmPassword;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    function userExists() {
        $query = "select * from tb_users where email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function isValid() {
        if (!$this->userExists()) {
            return true;
        }

        return false;
    }

    public function save() {
        $query = "insert into tb_users (email, password) values (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->bindValue(2, $this->__get('password'));
        $stmt->execute();

        return $this;
    }

    public function findUserAccount() {
        $query = "select * from tb_users where email = ? and password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(1, $this->__get('email'));
        $stmt->bindValue(2, md5($this->__get('password')));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

?>