<?php

namespace Model;
use Class\AbstractModel;
use PDO;

Class UserModel extends AbstractModel{

    public function createUser(int $id):void
    {
        $sql = $this->pdo->prepare("INSERT INTO user(id_user) VALUES(?)");
        $sql->execute([$id]);
    }

    public function userByID(int $id):array|bool
    {
        $sql = $this->pdo->prepare("SELECT id_user FROM user WHERE id_user = ?");
        $sql->execute([$id]);
        return $sql->fetch();

    }

    public function allUsers():array
    {
        $sql = $this->pdo->query("SELECT * FROM user");
        return $sql->fetchAll();
    }
}
?>