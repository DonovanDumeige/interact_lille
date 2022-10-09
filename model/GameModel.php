<?php

namespace Model;

use Class\AbstractModel;

class GameModel extends AbstractModel{

    /**
     * Récupère les lieux selon la catégorie.
     *
     * @param integer $id
     * @return array|boolean
     */
    public function getPlacesByID(int $id):array|bool
    {
        $sql = $this->pdo->prepare("SELECT * FROM lieu WHERE ID_CAT =:id");
        $sql->execute(["id"=>$id]);
        return $sql->fetchAll();
    }
    
    public function getIDsbyPlace(int $id):array
    {
        $sql = $this->pdo->prepare("SELECT q.ID from quizz q 
        INNER join lieu l ON q.ID_LIEU = l.ID WHERE l.ID =?");
        $sql->execute([$id]);
        return $sql->fetchAll();
    }


    /**
     * Crée un identifiant user
     *
     * @param integer $id
     * @return void
     */
    public function createUser(int $id)
    {
        $sql = $this->pdo->prepare('INSERT INTO user(id_user) VALUES (?)');
        $sql->execute([$id]);
    }

    public function getUser(int $id): array|false
    {
        $sql = $this->pdo->prepare('SELECT id_user FROM user WHERE id_user = ?');
        $sql->execute([$id]);
        return $sql->fetch();
    }
}
?>