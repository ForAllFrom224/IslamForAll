<?php
    include("../Private/conDB.php");
	$rq = $bd->query("SELECT question,date_demande FROM questions"); 
	$count = 1;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../CSS/menu.css?sizui">
	<link rel="stylesheet" href="../CSS/commune.css?lfkldklsk">
	<link rel="stylesheet" href="../CSS/users.css?klq">
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
	<p class="alerte container">Pour poser ou repondre à une question vous devez vous inscrire ou vous connecter</p>
	<p class="indication">questions</p>
	<div class="container text-center">
		<div class="row">
			<?php foreach($rq as $val){?>					
				<div class='col-4'>
					<?php
						if(!empty($rq)) { ?>
							<?php echo $count++." : "; ?><a href='#'><?php echo $val['question']; ?></a>
					<?php } ?>
					<?php echo "<br>" ?>
					<span class='info'><?php echo "Publié le ".$val['date_demande']; ?></span>			
				</div>
			<?php }?>									
		</div>
	</div>
  <div class="line"></div>
  <p class="indication">reponses</p>
  <div>
	je suis juste un teste de ce qui se passe ici 
  </div>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> -->
</body>
</html>