<?php
    session_start();
    include("../Private/conDB.php");
    include("menu_user.html");

    $id = $_SESSION['idUser'];

    $requete1 = $bd->query("SELECT id_question,reponse FROM answers WHERE id_user = $id AND is_delete_rep = 0");
    $requete2 = $bd->prepare("SELECT question,date_demande,id_user FROM questions WHERE id = ? AND is_delete_ques = 0");
    $requete3 = $bd->prepare("SELECT nom,prenom FROM users WHERE id = ?");    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>my-answers</title>
</head>
<body>
    <center>
        <section class="section-yourquestions">
            <?php foreach($requete1 as $req1){?>
                <?php $requete2->execute(array($req1['id_question']));?>
                <?php foreach($requete2 as $req2){?>
                    <?php $requete3->execute(array($req2['id_user'])); ?>
                    <?php foreach($requete3 as $req3){?>
                    <div class="question">
                        <?php echo $req2['question']."<br>";  ?>
                        <span class="info-rep-yourquestions"><?php echo "&nbsp &nbsp publié par ".$req3['prenom']." ".$req3['nom']." Le ".$req2['date_demande'] ?></span>
                        <p>
                            <?php echo $req1['reponse'] ?>
                        </p>
                    </div>                    

            <?php } }}?>
        </section>
    </center>

</body>
</html>