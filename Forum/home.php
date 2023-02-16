<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css?jhds">
    <link rel="stylesheet" href="../CSS/users.css?ss">
    <title>Document</title>
</head>
<body>
    <header>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link home-page" href="../index.html">Home Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link home" href="my_livre.php">Lire un livre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link home" href="forum2.php">My Forum</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link home active" aria-current="page" href="questions.php">My questions</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link home active" aria-current="page" href="answers.php">My Answers</a>
            </li>                                  
            <li class="nav-item">
                <a class="nav-link deconnexion" href="../Users/deconnexion.php">Deconnexion</a>                
            </li>
        </ul> 
        <hr>       
	</header>
    <h1 class="welcome">BIENVENUE <span id="name_user"><?php echo $_SESSION['lastname']." ".$_SESSION['firstname']; ?></h1></span>
    <?php
        if(isset($_POST['valider'])){
            if(!empty($_FILES['fichier']['name'])){
                $nom_file = $_FILES['fichier']['name'];
                $chemin = $_FILES['fichier']['tmp_name'];
                $type = $_FILES['fichier']['type'];
                $taille = $_FILES['fichier']['size'];
                
                $etat = move_uploaded_file($chemin,"../DOCS/".$nom_file); // on deplace le fichier vers le dossiers DOCS

                if($etat){
                    chmod("../DOCS/".$nom_file,0700); //mofifier les droits du fichier le 0 pour octal
                    echo "effectue avec succes";
                }else 
                    echo "pas reussi";

            }else
                echo "<div>Veuillez selectionner d'abord un fichier</div>";
        }
    ?>
    <div class="container">
        <div class="form-fichier">
            <form action="" method="post" enctype="multipart/form-data">
                <p>Cliqué pour ajouter des fichiers</p>
                <input type="file" name="fichier" id="fichier">
                <input type="submit" name="valider" value="Soumettre">
            </form>
        </div>
    </div>
</body>
</html>