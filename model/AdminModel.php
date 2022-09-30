<?php

namespace Model;
use Class\AbstractModel;

class AdminModel extends AbstractModel
{
    /**
     * Recupère l'admin via son email
     * Gère la page connexion admin
     *
     * @param string $email
     * @return array|false
     */
    public function getAdminbyEmail(string $email):array|false
    {
        $sql = $this->pdo->prepare("SELECT * from admin WHERE email = :em");
        $sql->execute(["em"=>$email]);
        return $sql->fetch();
    }
    
    /**
     * Recupère toutes les data de la table quizz
     *
     * @return array|boolean
     */
    public function getAllQuestions():array|bool
    {
        $sql = $this->pdo->query("SELECT * from quizz");
        return $sql->fetchAll();
    }

    /**
     * Récupère le nom du lieu selon ID commun entre lieu et quizz
     *
     * @return array|boolean
     */
    public function getPlaceByID():array|bool
    {   
        $sql = $this->pdo->query("SELECT NOM_LIEU FROM lieu l INNER JOIN quizz q ON q.ID_LIEU = l.ID" );
        return $sql->fetch();
    }
    /**
     * Récupère toutes les data de categorie
     *
     * @return array
     */
    public function getAllCategories():array
    {
        $sql = $this->pdo->query("SELECT * from categorie");
        return $sql->fetchAll();
    }

    public function getAllPlaces():array
    {
        $sql = $this->pdo->query("SELECT * FROM lieu");
        return $sql->fetchAll();
    }

    public function addQuestion(
        
        string $question, 
        string $anecdote,
        string $r1,
        string $r2,
        string $r3,
        string $r4,
        int $id_lieu,
        int $id_br,
        ):void
        {
            $sql = $this->pdo->prepare("INSERT INTO quizz (ID_LIEU, question, anecdote, r1,r2,r3,r4,br)
            VALUES(:id_lieu, :question, :anecdote, :r1, :r2, :r3, :r4, :id_br)");
            $sql->execute([
                "id_lieu"=>$id_lieu,
                "question"=>$question,
                "anecdote"=>$anecdote,
                "r1"=>$r1,
                "r2"=>$r2,
                "r3"=>$r3,
                "r4"=>$r4,
                "id_br"=>$id_br
            ]);
        }
    /* public function updateQuestionById(){} */
    /* public function deleteQuestionById(){} */
}
?>