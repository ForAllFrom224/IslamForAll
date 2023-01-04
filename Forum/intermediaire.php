<?php
    session_start();
    include("../Private/conDB.php");

    $id= $_SESSION['idUser'];
   if(isset($_POST['lien']) && !empty($_POST['lien'])){
        // $question = $_POST['lien'];
        // $reqQues = $bd->prepare("SELECT question FROM questions WHERE id = ? ");
        // $reqQues->execute(array($question));

        // $reqRep = $bd->prepare("SELECT reponse FROM answers WHERE id_question = ? ");
        // $reqRep->execute(array($question));

        // $_SESSION['questions'] = $reqQues;
        // $_SESSION['reponses'] =  $reqRep;
        $_SESSION['lien'] = $_POST['lien'];

        header("Location: ./reponse.php");
   }
    
?>