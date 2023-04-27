<?php
    include("../Private/conDB.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">    
    <title>Document</title>
</head>
<body>
    <?php
        include('menu.html');
    ?> 
    <div class="line"></div>
    <?php 
        if(isset($_POST['valider'])){
            if((isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp1']) && isset($_POST['mdp2'])) &&
            (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['mdp1']) && !empty($_POST['mdp2']))){
                if($_POST['mdp1'] == $_POST['mdp2']){
                    $rq = $bd->prepare("INSERT INTO users(nom,prenom,email,mot_de_pass) VALUES (?,?,?,?)");
                    $rq->execute(array($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp1']));
                    header("Location: connexion.php");
                }else{
                    echo "<div class='alerte lesDeux'>Les deux mot de pass ne correspondent pas</div>";
                }
            }else{
                echo "<div class='alerte lesDeux'>Veuillez remplir tous les champs pour une bonne inscription</div>";
            }
        }
    ?>
    <div class="container conteneur-login">
        <form action="" method="post">
            <div class="mb-2">
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Votre nom...">
            </div>
            <div class="mb-2">
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Votre prenom...">
            </div>
            <div class="mb-2">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre email...">
            </div>
            <div class="mb-2">
                <input type="password" class="form-control" name="mdp1" id="mdp" placeholder="Votre mot de pass...">
            </div>
            <div class="mb-2">
                <input type="password" class="form-control" name="mdp2" id="mdp_confirm" placeholder="Confirmation du mot de pass...">
            </div>
            <div>
                <center><button type="submit" class="btn btn-primary" id="inscription" name="valider">s'inscrire</button></center><br>
                Vous avez déjà un compte : <a href="connexion.php">Connectez-vous</a>                
            </div>
        </form>
    </div>
    <script src="../JS/histoire.js"></script>
</body>
</html>