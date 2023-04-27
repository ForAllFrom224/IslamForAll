<?php
    session_start();

    $id = $_SESSION['idUser'];
    include("../Private/conDB.php");

    $requete = $bd->query("SELECT id,question,date_demande FROM questions WHERE id_user = $id AND is_delete_ques = 0");
    $reponse = $bd->prepare("SELECT reponse,date_reponse,id_user FROM answers WHERE id_question = ? AND is_delete_rep = 0");
    $requete_nom = $bd->prepare("SELECT nom,prenom FROM users WHERE id = ?");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    <title>Document</title>
</head>
<body>
    <?php include("menu_user.html"); ?>      

    <center>
        <section class="section-yourquestions">
            <?php foreach($requete as $req) {?>
                <?php $reponse->execute(array($req['id'])); ?>
                    <div class="question">
                        <?php echo $req['question']."<br>";  ?>
                        <span class="info-question-yourquestions"><?php echo "Le ".$req['date_demande']."<br>";  ?></span>
                        <p class='debut-reponse'>DEBUT DES REPONSES</p>
                        <?php foreach($reponse as $rep){?>                        
                            <?php $requete_nom->execute(array($rep['id_user'])) ?>
                            <p class='reponses'> <?php echo  $rep['reponse']."<br>";  ?>
                            <?php foreach($requete_nom as $req_nom){?>
                                <span class="time info-rep-yourquestions"><?php echo "&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp Par ".$req_nom['nom']." ".$req_nom['prenom']." ";  ?></span>
                            <?php } ?>
                            <span class="time info-rep-yourquestions"> <?php echo "Le ".$rep['date_reponse']."<br>";  ?></span></p>
                        <?php } ?>
                    </div> 
            <?php } ?>
        </section>    
    </center>
</body>
</html>