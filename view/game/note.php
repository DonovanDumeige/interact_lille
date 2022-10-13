<?php
// todo idée pour avancer dans les questions
/* dans le href du <a> 
if($data['question'] == NULL)
{ # soit on passe à la question suivante
    href="/play/answer?id=$data['ID']";
}
else{ #soit on passe d'abord par l'anecdote
    href="/play/anecdote?id= $data['ID']";
} */

//todo idée pour arriver soit sur correct/incorrect
/* Impossible de cumuler renvoyer sur deux fichiers différent.
Essayer $_SESSION
if($data['br'] == $_POST['check'])
{ #renvoi vers correct
    $_SESSION['answer'] = true;
}
else{ #renvoi vers incorrect
    $_SESSION['answer'] = false
}
En fonction de la réponse sur le p (ou div) qui donne la réponse
echo $_SESSION['answer']?"Correct":"Incorrect";
Il faut aussi changer la classe :
class = "<?php echo $_SESSION['answer']?'good':'bad' ?>"; */
?>