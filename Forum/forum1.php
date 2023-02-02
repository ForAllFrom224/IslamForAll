<?php
    include("../Private/conDB.php");
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

	$requete = $bd->query("SELECT id,question,date_demande FROM questions  ORDER BY id DESC LIMIT $debut,$nombre_question_page"); 
	$requete->setFetchMode(PDO::FETCH_ASSOC);
	$requete->execute();
	$rq = $requete->fetchAll();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../CSS/menu.css?sfgi">
	<link rel="stylesheet" href="../CSS/commune.css?skskskjs">
	<link rel="stylesheet" href="../CSS/users.css?jdq">
    <title>Document</title>
</head>
<body>
	<header>
		<nav>
			<div>
				<div class="islam">ISLAM POUR TOUS</div>
				<div class="lien_1">
					<a class="a" href="../index.html">Accueil</a>
					<a class="a" href="../Code/histoire.php">Histoire-Islamique</a>
					<a class="a" href="forum1.php">Forum</a>
					<a class="a" href="../Code/livre.php">Livre</a>
					<a class="a" href="../Code/quiz.php">Quiz</a>
					<a class="a" href="../Code/about.php">A propos</a>
				</div>
				<div class="lien_2">
					<a href="../Users/connexion.php" id="con">Connexion</a>
					<a href="../Users/inscription.php" id="ins">Inscription</a>
				</div>
			</div>
		</nav>
	</header>
	<div class="line"></div>
    <h1>Forum</h1>
	<p class="alerte container limite-animation">Pour poser ou repondre à une question vous devez vous inscrire ou vous connecter</p>
	<p class="indication">questions</p>
	<div class="container text-center">
		<div class="row forum1">
			<?php for ($i=0; $i < count($rq) ; $i++) { ?>					
				<div class='col-12 question-forum1'>
					<a href='#'><?php echo $rq[$i]['question']; ?></a>												
					<?php echo "<br>" ?>
					<span class='info'><?php echo "Publié le ".$rq[$i]['date_demande']; ?></span>			
				</div>
			<?php }?>									
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
  <div>
	&nbsp;
  </div>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
</body>
</html>