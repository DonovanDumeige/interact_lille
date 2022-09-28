<?php

namespace Model;
use Class\AbstractModel;

class AdminModel extends AbstractModel
{
    public function getAdminbyEmail(string $email):array|false
    {
        $sql = $this->pdo->prepare("SELECT * from admin WHERE email = :em");
        $sql->execute(["em"=>$email]);
        return $sql->fetch();
    }
 
    public function getAllQuestions():array
    {
        $sql = $this->pdo->query("SELECT * from quizz");
        return $sql->fetchAll();
    }
    /* public function getAllCategories(){}*/
    /*  public function getPlaceById(){}*/
    /* public function createQuestion(){} */
    /* public function createAnecdoteOnly(){} */
    /* public function updateQuestionById(){} */
    /* public function deleteQuestionById(){} */
}
?>