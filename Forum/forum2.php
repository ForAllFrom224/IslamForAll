<?php 
    session_start();
    include("menu_user.html");     
    include("../Private/conDB.php");
    $id= $_SESSION['idUser']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css?">
	<link rel="stylesheet" href="../CSS/users.css?sksksk">
    <title>Document</title>
</head>
<body>    
    <h1 class="forum2">Forum</h1>
    <a href="#pose-question" style="text-decoration: none;"><p class="indication">questions</p></a>
    <?php
        if(isset($_POST['valider'])){
            if(isset($_POST['question']) && !empty($_POST['question'])){       
                $rq = $bd->prepare("INSERT INTO questions(question,id_user) values(?,?)");
                $rq->execute(array($_POST['question'],$id));
            }else{
                echo "<div class='alerte lesDeux'>Veuillez écrire quelques choses avant de passer à la publication</div>";
            }
        }

        $rq_nombre_element = $bd->query("SELECT COUNT(id) AS cpt FROM questions"); 
        $rq_nombre_element->setFetchMode(PDO::FETCH_ASSOC);
        $rq_nombre_element->execute();
        $trq = $rq_nombre_element->fetchAll();

        // code pour la pagination
        $page = $_GET['page'] ?? 1; //par defaut la page vaut page 1 qui doit etre la page courante	
        $nombre_question_page = 10;	
        $nombre_page = ceil($trq[0]['cpt'] / $nombre_question_page); //on prend l'arrondi superieur en cas de nombre decimal
        if($page > $nombre_page)
            $page = 1;
        
        $debut = ($page - 1 ) * $nombre_question_page;

        $requete = $bd->query("SELECT id,question,date_demande,id_user FROM questions ORDER BY id DESC LIMIT $debut,$nombre_question_page"); 
        $requete->setFetchMode(PDO::FETCH_ASSOC);
        $requete->execute();
        $rq = $requete->fetchAll(); 
        /* 
            on obtient un tableau a deux dimensions contenant les infos de chaque colonne à une position i 
            $rq[$i][nom_colonne] : pour acceder à la colonne (nom_colonne) de l'element i
        */
       
        $count = 1;

        $req = $bd->prepare("SELECT prenom FROM users NATURAL JOIN questions WHERE id = ?");
    ?>
	<div class="container text-center">
		<div class="row forum2">
			<?php for($i = 0; $i < count($rq); $i++){?>
                <?php $req->execute(array($rq[$i]['id_user'])); ?>
                <div class='col-12 question-forum2'>  
                    <form action="intermediaire.php" method="get">                                                                                                 
                        <!-- <input type="hidden" name="lien" value="<?php echo $count; ?>">                                     -->
                        <button type="submit" class="buttonTest">
                            <a href="intermediaire.php?lien=<?php $count; echo $rq[$i]["id"]; ?>" title="clique pour repondre"><?php echo $rq[$i]['question']."<br>";?></a>
                            <?php foreach($req as $r){?>
                                <span class='info'><?php echo "Publié le ".$rq[$i]['date_demande'];?></span>                            
                                <span class='info'><?php echo " par ".$r['prenom'];?></span>                                
                            <?php } ?>                            
                        </button>                                                                                                                                  
                    </form>                            
                    <?php $count++; ?>  					                                     
                </div>
            <?php } ?>                 									
		</div>
        <div class="pagination">
            <?php 
                for ($i=1; $i <= $nombre_page ; $i++){
                    if($page != $i)
                        echo "<a href='?page=$i' class='page_nonclique'>$i</a>&nbsp";
                    else
                        echo "<a class='page_clique'>$i</a>&nbsp";
                }
            ?>
		</div>
  </div>
  <div class="line"></div>
    <div class="pose-question" id="pose-question">
        <span>POSER VOS QUESTIONS ICI : </span>
        <form action="" method="post">
            <textarea name="question" id="question" cols="50" rows="10" class=""></textarea>
            <button type="submit" class="btn btn-primary" name="valider">Soumettre</button>
        </form>
    </div>
    <!-- <div class="line"></div> -->
</body>
</html>