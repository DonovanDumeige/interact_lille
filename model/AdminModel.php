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
    
    public function createAdmin(string $email, string $password)
    {
        $sql = $this->pdo->prepare("INSERT INTO admin(email, password) VALUES(?,?)");
        $sql->execute([$email, $password]);
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

    public function getAllQuestionsbyID(int $id):array
    {
        $sql = $this->pdo->prepare("SELECT * from quizz q INNER JOIN categorie c ON q.ID_LIEU = c.ID_LIEU WHERE ID_LIEU=?");
        $sql->execute([$id]);
        return $sql->fetchAll();
    }
    public function getQuestionById($id):array|bool
    {
        $sql = $this->pdo->prepare("SELECT * FROM quizz WHERE ID=?");
        $sql->execute([$id]);
        return $sql->fetch();
    }
    /**
     * Récupère le nom du lieu, la question et son index selon ID commun entre lieu et quizz
     *
     * @return array|boolean
     */
    public function getQuestionAndPlaceByID():array|bool
    {   
        $sql = $this->pdo->query("SELECT l.NOM_LIEU, q.ID, q.question FROM quizz q INNER JOIN lieu l ON q.ID_LIEU = l.ID" );
    
        return $sql->fetchAll();
    }

    /**
     * Sélectionne toutes les données des table quizz, lieu & categorie
     *
     * @return array|boolean
     */
    # ? avant le paramètre permet de le rendre optionnel
    public function getQuestionWithPlaceAndCategorie(?int $id=NULL):array|bool{
        $request = "SELECT q.*, c.NOM_CAT, l.NOM_LIEU FROM quizz q INNER JOIN lieu l ON l.ID = q.ID_LIEU INNER JOIN categorie c ON c.ID = l.ID_CAT";

        if ($id !== NULL)
        {
            $request .= " WHERE q.ID = " . $id;
        }
        $sql = $this->pdo->query($request);
        return $sql->fetchAll();
    }

     /**
     * Sélectionne toutes les données des table quizz, lieu & categorie
     *
     * @return array|boolean
     */
    # ? avant le paramètre permet de le rendre optionnel
    public function getQuestionsByCategorie():array|bool{
        $request = "SELECT q.* FROM quizz q INNER JOIN lieu l ON l.ID = q.ID_LIEU INNER JOIN categorie c ON c.ID = l.ID_CAT";
        $sql = $this->pdo->query($request);
        return $sql->fetchAll();
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
        ):void
        {
            $sql = $this->pdo->prepare("UPDATE quizz SET ID_LIEU=:lieu, question=:question, anecdote=:anecdote, 
            r1=:r1, r2=:r2, r3=:r3, r4=:r4, br=:br WHERE ID=:id");
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
    
    
    
    public function deleteQuestionById(int $id):void
    {
        $sql = $this->pdo->prepare("DELETE FROM quizz WHERE ID=:id");
        $sql->execute(["id"=>$id]);
    }
}
?>