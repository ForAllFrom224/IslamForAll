<?php
    include("../Private/conDB.php");

    if ($_GET['name']=="user"){
        $id = $_GET['id'];
        $requete = $bd->prepare("DELETE FROM users WHERE id = ?");
        $requete->execute(array($id));
    }

    if($_GET['name']=="question"){
        $id = $_GET['id'];
        $requete = $bd->prepare("DELETE FROM questions WHERE id = ?");
        $requete->execute(array($id));
    }

    if($_GET['name']=="reponse"){
        $id = $_GET['id'];
        $requete = $bd->prepare("DELETE FROM reponse WHERE id = ?");
        $requete->execute(array($id));
    }

    header("Location: admin1.php");

?>