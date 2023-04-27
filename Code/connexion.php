<?php
    session_start();
    include("../Private/conDB.php");

    $rq = $bd->query("SELECT id,nom,prenom,email,mot_de_pass FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">    
    <title>Document</title>
    <script src="../JS/validation.js"></script>
</head>
<body>
    <?php
        include('menu.html');
    ?>
    <div class="line"></div>
    <?php       
        if(isset($_POST['valider'])){
            if((isset($_POST['email']) && isset($_POST['mdp'])) && (!empty($_POST['email']) && !empty($_POST['mdp']))){
                $variable = 0;
                foreach($rq as $val){
                    if(($_POST['email'] == $val['email']) && ($_POST['mdp'] == $val['mot_de_pass'])){
                        $_SESSION['idUser'] = $val['id'];
                        $_SESSION['user'] = $_POST["email"];
                        $_SESSION['firstname'] = $val['nom'];
                        $_SESSION['lastname'] = $val['prenom'];
                        $variable = 1;
                        break;                               
                    }
                }

                // pour eviter l'execution du javaScript dans la boucle au cas où la condition de son exec sera valide
                if($variable == 1)
                    header("Location: ../users/home.php"); 
                else{
                // echo "<script>alert('NADA')</script>";
                    echo "<div class='bad lesDeux'>Une erreure avec le mot de pass ou l'adresse email</div>";

                }
            }else{
                echo "<div class='alerte lesDeux'>Veuillez remplir tous les champs pour une bonne connexion</div>";
            }
        }
    ?>
    <main class="img-login">
        <!-- <div>
            <img src="https://cdn.pixabay.com/photo/2019/01/17/19/11/registration-3938434_1280.jpg" alt="" srcset="">
        </div>         -->
        <div class="container conteneur-login conteneur-connexion">
            <form action="" method="post">
                <div class="mb-2">
                    <input type="email"  class="form-control" name="email" id="email" placeholder="Votre email...">
                </div>
                <div class="mb-2">
                    <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Votre mot de pass...">
                </div>
                <div>
                    <center><button type="submit" class="btn btn-primary mb-1" id="connexion" name="valider">se connecter</button></center><br>
                    Vous n'avez pas de compte : <a href="inscription.php">Inscrivez-vous</a>
                </div>
            </form>
        </div>
    </main>    
</body>
</html>