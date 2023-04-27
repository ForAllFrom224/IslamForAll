<?php
    session_start();

    $id= $_SESSION['idUser'];
   if(isset($_GET['lien']) && !empty($_GET['lien'])){
        $_SESSION['lien'] = $_GET['lien'];

        header("Location: ./reponse.php");
   }
?>