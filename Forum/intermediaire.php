<?php
    session_start();

    $id= $_SESSION['idUser'];
   if(isset($_GET['lien']) && !empty($_GET['lien'])){
        $_SESSION['lien'] = $_GET['lien'];

        header("Location: ./reponse.php");
   }

   if(isset($_GET['l']) && !empty($_GET['l'])){
          $_SESSION['lien'] = $_GET['l'];

        header("Location: ./reponse.php");
   }
    
?>