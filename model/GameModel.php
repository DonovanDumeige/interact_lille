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
}
?>