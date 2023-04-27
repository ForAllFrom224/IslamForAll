<?php
    include("../Private/conDB.php");

    @$idQ = $_GET['idQuestion'];
    
    $requete = $bd->prepare("UPDATE questions SET is_delete_ques = 1 WHERE id = ?");
    $requete->execute(array($idQ));

    header("Location: forum.islam.php");
?>