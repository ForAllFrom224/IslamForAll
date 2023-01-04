<?php
    session_start();
    include("../Private/conDB.php");

    $id= $_SESSION['idUser'];
    $total = $_SESSION['total'];

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
	<link rel="stylesheet" href="../CSS/users.css?skskd">
    <title>Document</title>
</head>
<body>
    <header>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link " href="home.php">Home Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="forum2.php">My Forum</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">My questions</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">My Answers</a>
            </li>                                  
            <li class="nav-item">
                <a class="nav-link disabled">Deconnexion</a>                
            </li>
        </ul>        
	</header>

  <div class="line"></div>
  <p class="indication">reponses</p>
    <div class="centre">
        <?php
            //$question = $_POST["lien"] ?? 1;
            //echo "Je suis juste le ".$question; 

            // $reste = $total - $q;
            // $question = $total - $reste;                       

            if(isset($_POST['reponse']) && !empty($_POST['reponse'])){                                     
                $requete = $bd->prepare("INSERT INTO answers(id_question,reponse,id_user) values(?,?,?)");
                $requete->execute(array($question,$_POST['reponse'],$id));
            }else{
                echo "<div class='alerte lesDeux'>Veuillez repondre d'abord avant de passer à la publication</div>";
            }
            
            $reqQues = $bd->prepare("SELECT question FROM questions WHERE id = ? ");
            $reqQues->execute(array($question));
            
            $req = $bd->prepare("SELECT nom,prenom FROM users WHERE id = ?");

            $reqRep = $bd->prepare("SELECT reponse,date_reponse,id_user FROM answers WHERE id_question = ? ");
            $reqRep->execute(array($question));
        ?>
        <div class="rep">
            <?php foreach($reqQues as $ques){?>
                <p class="p ques-forum">    
                    <?php echo $ques['question'];?>
                </p>
            <?php }?>
            <?php foreach($reqRep as $rep){?>
                <?php $req->execute(array($rep['id_user'])); ?>
                <p class="p rep-forum">  
                    <?php 
                        if(!empty($reqRep))
                            echo $rep['reponse']."<br>"."&nbsp &nbsp"; 
                    ?>
                    <?php foreach($req as $r){?>
                        <span class="span"><?php echo "Par ".$r['prenom']." ".$r['nom']; ?></span>
                        <span class="temps span"><?php echo "Le ".$rep['date_reponse']; ?></span>
                     <?php } ?>
                </p>                
            <?php }?>
        </div>
        <div class="question" id="<?php echo $question;?>">
            <form action="" method="post">
                <!-- <input type="number" name="newLien" id="" placeholder="Numero de la question..."> -->
		        <textarea name="reponse" id="reponse" cols="50" rows="10" class=""></textarea>
		        <button type="submit" class="btn btn-primary">Repondre</button>
	        </form>
        </div>
    </div>
</body>
</html>