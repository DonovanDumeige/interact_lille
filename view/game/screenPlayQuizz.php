<?php 
require __DIR__."/../../assets/template/_header.php";
require __DIR__."/../../assets/template/_nav.php";
if($data)
?>

<div class="topPart">
        <div class="containerTitles">
        <?php foreach($data as $d){  ?>
            
            <h1><?php echo $d['NOM_CAT'] ?></h1>
            <p>
                <?php if($d['question'] === NULL){ ?> 
                    <i class="fa-solid fa-lightbulb"></i> Le saviez-vous ?
                <?php 
                }
                else{
                    echo $d['question'];
                } ?>
            </p>
        </div>
            <h2><?php $d['NOM_LIEU'] ?></h2>
        

</div>

<div class="visitPlace">
    <div class="infoVisitPlace">
        <h3>Visitez cet endroit</h3>
        <ul>
            <li><strong>Adresse : </strong> 666 rue de l'enfer, ResponsiveDeLaMuerte</li>
            <li><strong>Téléphone :</strong> xx xx xx xx xx</li>
            <li><strong>À proximité de :</strong>  ton Âme</li>
            <li><strong>Temps de trajet : </strong> Une vie entière Bro</li>
        </ul>

    </div>
    <div><a class="showInfo" href="">Voir sur la carte</a></div>
    <div class="buttonVisitPlace">Visitez cet endroit</div>
</div>

<div class="bottomPart">
    <?php if ($d['question'] !== NULL){ ?>
    <form class="propositions" method='POST'>
        <div class="pick"> 
            <input type="radio" name="good" value="1"> 
            <p><?php echo $d['r1']; ?></p>
        </div>

        <div class="pick"> 
            <input type="radio" name="good" value="2"> 
            <p><?php echo $d['r2']; ?></p>
        </div>

        <div class="pick"> 
            <input type="radio" name="good" value="3"> 
            <p><?php echo $d['r3']; ?></p>
        </div>

        <div class="pick"> 
            <input type="radio" name="good" value="4"> 
            <p><?php echo $d['r4']; ?></p>
        </div>
        <span class="error"><?php echo $error['good']??"" ?></span>
        <input type="submit" name="check" value="Vérifions la réponse !">
        </form>
    <?php
    } 
    else{ ?>
        <div class="tell">
            <?php echo $d['anecdote'] ?>
        </div>
       
        <?php } #endif question =! NULL ?>
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
<?php if ($d['question'] == NULL){ ?>

<button class="nextElement"><a href="">Question suivante &gt; </a></button>
<?php }#endif ?>
</div> 

<?php 

}
require __DIR__."/../../assets/template/_footer.php"; ?>
