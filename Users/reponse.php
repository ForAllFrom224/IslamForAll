<?php
    session_start();
    include("../Private/conDB.php");

    $id= $_SESSION['idUser'];

    // $reqQues = $_SESSION['questions'];
    // print_r($reqQues);
    // $reqRep = $_SESSION['reponses'];
    $question = $_SESSION['lien'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css?">	
    <title>Document</title>
</head>
<body>
    <?php include("menu_user.html"); ?>

  <a class="orange" href="#zone-reponse">repondre directement</a>
    <main class="section-main row">
        <?php
            //$question = $_POST["lien"] ?? 1;
            //echo "Je suis juste le ".$question; 

            // $reste = $total - $q;
            // $question = $total - $reste;                       

            if(isset($_POST['rep'])){
                if(isset($_POST['reponse']) && !empty($_POST['reponse'])){                                     
                    $requete = $bd->prepare("INSERT INTO answers(id_question,reponse,id_user) values(?,?,?)");
                    $requete->execute(array($question,$_POST['reponse'],$id));
                }else{
                    echo "<div class='alerte lesDeux'>Veuillez repondre d'abord avant de passer à la publication</div>";
                }
            }
            
            $reqQues = $bd->prepare("SELECT question FROM questions WHERE id = ? AND is_delete_ques = 0");
            $reqQues->execute(array($question));
            
            $req = $bd->prepare("SELECT nom,prenom FROM users WHERE id = ?");

            $reqRep = $bd->prepare("SELECT reponse,date_reponse,id_user FROM answers WHERE id_question = ? AND is_delete_rep = 0");
            $reqRep->execute(array($question));

            $requete = $bd->query("SELECT * FROM questions WHERE is_delete_ques = '0' ORDER BY id DESC"); 
            $requete->setFetchMode(PDO::FETCH_ASSOC);
            $requete->execute();
            $rq = $requete->fetchAll();

            $req_question_section = $bd->prepare("SELECT prenom FROM users NATURAL JOIN questions WHERE id = ?");
        ?>
        <section class="section-reponse-forum2 col-6">
            <div class="rep row">
                <div class="col-12 question-reponses">          
                    <?php foreach($reqQues as $ques){?>
                        <p class="zone-question-rep">    
                            <?php echo $ques['question'];?>
                        </p>
                    <?php }?>
                    <?php foreach($reqRep as $rep){?>
                        <?php $req->execute(array($rep['id_user'])); ?>
                        <p class="p reponses-forum2">  
                            <?php 
                                if(!empty($reqRep))
                                    echo $rep['reponse']."<br>"."&nbsp &nbsp"; 
                            ?>                         
                            <?php foreach($req as $r){?>
                                <span class="info-reponses"><?php echo "Par ".$r['prenom']." ".$r['nom']; ?></span>
                                <span class="info-reponses"><?php echo " &nbsp; [ ".$rep['date_reponse']." ]"; ?></span>
                            <?php } ?>
                        </p>                                  
                    <?php }?>
                </div>         
            </div>                   
            <form action="" method="post">
                <!-- <input type="number" name="newLien" id="" placeholder="Numero de la question..."> -->
                <center><textarea name="reponse" id="zone-reponse" cols="50" rows="10" class=""></textarea><br>
                <button type="submit" class="btn bouton" name="rep">Repondre</button></center>
            </form>            
        </section>                
    </main>
</body>
</html>