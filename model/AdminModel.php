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

    public function getQuestionById($id):array|bool
    {
        $sql = $this->pdo->prepare("SELECT * FROM quizz WHERE ID=?");
        $sql->execute([$id]);
        return $sql->fetch();
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

    /**
     * Récupère toutes les données de lieu
     *
     * @return array
     */
    public function getAllPlaces():array
    {
        $sql = $this->pdo->query("SELECT * FROM lieu");
        return $sql->fetchAll();
    }


    /**
     * Crée un élément de jeu
     * Anecdote obligatoire
     * Question optionelle
     *
     * @param integer|string $id_lieu
     * @param string $question
     * @param string $anecdote
     * @param string $r1
     * @param string $r2
     * @param string $r3
     * @param string $r4
     * @param integer|string $id_br
     * @return void
     */
    public function addQuestion(
        
        int|string $id_lieu,
        string $question, 
        string $anecdote,
        string $r1,
        string $r2,
        string $r3,
        string $r4,
        int|string $id_br
        ):void
        {
            $sql = $this->pdo->prepare("INSERT INTO quizz (ID_LIEU, question, anecdote, r1,r2,r3,r4,br)
            VALUES((SELECT ID from lieu WHERE ID=:id_lieu), :question, :anecdote, :r1, :r2, :r3, :r4, :id_br)");
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

            // ! Ne fonctionnera pas, il va ajouter seulement un ID et ce n'est pas ce que je veux.
            /* $sql = $this->pdo->prepare("INSERT INTO lieu(ID_CAT) VALUES((SELECT ID from categorie WHERE ID=:id_cat))");
            $sql->execute(["id_cat"=>$id_cat]); */
        }

    public function updateQuestionById(
        int|string $id_lieu,
        string $question, 
        string $anecdote,
        string $r1,
        string $r2,
        string $r3,
        string $r4,
        int|string $id_br,
        int $id
    ){
        $sql = $this->pdo->prepare("UPDATE quizz SET ID_LIEU=:lieu, question=:question, anecdote=:anecdote, 
        r1=:r1, r2=:r2, r3=:r3, r4=:r4 br=:br WHERE ID=:id");
        $sql->execute([
            "lieu"=>$id_lieu,
            "question"=>$question,
            "anecdote"=>$anecdote,
            "r1"=>$r1,
            "r2"=>$r2,
            "r3"=>$r3,
            "r4"=>$r4,
            "br"=>$id_br,
            "id"=>$id
        ]);
    }
    /* public function updateQuestionById(){} */
    /* public function deleteQuestionById(){} */
}
?>