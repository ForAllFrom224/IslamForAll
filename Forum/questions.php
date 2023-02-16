<?php
    session_start();

    $id = $_SESSION['idUser'];
    include("../Private/conDB.php");

    $requete = $bd->query("SELECT id,question,date_demande FROM questions WHERE id_user = $id");
    $reponse = $bd->prepare("SELECT reponse,date_reponse,id_user FROM answers WHERE id_question = ?");
    $requete_nom = $bd->prepare("SELECT nom,prenom FROM users WHERE id = ?");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../CSS/users.css?dsks">
    <title>Document</title>
</head>
<body>
    <?php include("menu_user.html"); ?>      

    <center>
        <div class="question-display">
            <?php foreach($requete as $req) {?>
                <?php $reponse->execute(array($req['id'])); ?>
                    <div class="question">
                        <?php echo $req['question']."<br>";  ?>
                        <span> <?php echo "Le ".$req['date_demande']."<br>";  ?></span>
                    </div>                    
                    <?php foreach($reponse as $rep){?>
                        <?php $requete_nom->execute(array($rep['id_user'])) ?>
                        <p class='reponse'> <?php echo  $rep['reponse']."<br>";  ?></p>
                        <?php foreach($requete_nom as $req_nom){?>
                            <span class="time"><?php echo "&nbsp &nbsp &nbsp&nbsp &nbsp &nbsp Par ".$req_nom['nom']." ".$req_nom['prenom']." ";  ?></span>
                        <?php } ?>
                        <span class="time"> <?php echo "Le ".$rep['date_reponse']."<br>";  ?></span>
                    <?php } ?>
            <?php } ?>
        </div>    
    </center>
</body>
</html>