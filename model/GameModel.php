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
        $sql = $this->pdo->prepare("SELECT * FROM lieu WHERE ID_CAT =?");
        $sql->execute([$id]);
        return $sql->fetchAll();
    }
}
?>