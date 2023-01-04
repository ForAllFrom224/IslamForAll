<?php
    session_start();
    include("../Private/conDB.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css?">
	<link rel="stylesheet" href="../CSS/users.css?ddkkdjkk">
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

    <h1 class="forum2">Forum</h1>
    <p class="indication">questions</p>
    <?php
        $id= $_SESSION['idUser']; 

        if(isset($_POST['question']) && !empty($_POST['question'])){       
            $rq = $bd->prepare("INSERT INTO questions(question,id_user) values(?,?)");
            $rq->execute(array($_POST['question'],$id));
        }else{
            echo "<div class='alerte lesDeux'>Veuillez écrire quelques choses avant de passer à la publication</div>";
        }

        $rq = $bd->query("SELECT id,question,date_demande,id_user FROM questions"); 
        $count = 1;

        $req = $bd->prepare("SELECT nom,prenom FROM users NATURAL JOIN questions WHERE id = ?");
    ?>
	<div class="container text-center">
		<div class="row">
			<?php foreach($rq as $val){?>
                <?php $req->execute(array($val['id_user'])); ?>
				<div class='col-4'>
					<?php
						if(!empty($rq)) { ?>                                
                                <form action="intermediaire.php" method="post">
                                    <?php echo $count++." : "; ?>
                                    <a href="#<?php $lien = $count - 1; echo $lien;?>"><?php echo $val['question'];?></a>
                                    <input type="hidden" name="lien" value="<?php $_SESSION['total'] = $lien; echo $lien;?>">                                    
                                    <button type="submit" class="buttonTest">Repondre à cette question</button>
                                </form>
					<?php } ?>
                    <?php foreach($req as $r){?>
					    <span class='info'><?php echo "Publié par ".$r['prenom'];?></span>
				    	<span class='info'><?php echo "le ".$val['date_demande'];?></span>
                    <?php } ?>
				</div>
			<?php }?>									
		</div>
  </div>
  <div class="line"></div>
    <div class="question">
        POSER VOS QUESTIONS ICI : 
        <form action="" method="post">
            <textarea name="question" id="question" cols="50" rows="10" class=""></textarea>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
</body>
</html>