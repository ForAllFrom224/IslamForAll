<?php
    session_start();
    include("../Private/conDB.php");

    if ($_GET['name']=="user"){
        @$idU = $_GET['idU'];
        @$etat = $_GET['etat'];

        if($etat == "actif"){
            $requete = $bd->query("UPDATE users SET is_active = 1 WHERE id = $idU");

        }else{
            $requete = $bd->query("UPDATE users SET is_active = 0 WHERE id = $idU");
        }
        // $requete = $bd->prepare("DELETE FROM users WHERE id = ?");
        // $requete->execute(array($id));
        // $requete = $bd->query("UPDATE users SET is_active = 0 WHERE id = $idU");
    }   

    // if(isset($_POST['actif'])){
    //     echo "<script>alert('yes')</script>";
    // }

    if($_GET['name']=="question"){
        @$idQ = $_GET['idQ'];        
        $requete = $bd->prepare("UPDATE questions SET is_delete_ques = 1 WHERE id = ?");
        $requete->execute(array($idQ));
    }

    if($_GET['name']=="reponse"){
        $idR = $_GET['idR'];        
        $requete = $bd->prepare("UPDATE answers SET is_delete_rep = 1 WHERE id = ?");
        $requete->execute(array($idR));

    }

    // if(isset($_POST['delete'])){
    //     $id = $_POST['id_com'];
    //     $requete = $bd->prepare("DELETE FROM questions WHERE id = ?");
    //     $requete->execute(array($id));
    // }

    header("Location: admin.url.php");

?>