<?php
    include("../Private/conDB.php");

    $requete1 = $bd->query("SELECT * FROM users");
    $req_users = $bd->query("SELECT COUNT(*) AS nombre FROM users");

    $requete2 = $bd->query("SELECT * FROM questions");
    $req_question = $bd->query("SELECT COUNT(*) AS nombre FROM questions");

    $requete3 = $bd->query("SELECT * FROM answers NATURAL JOIN questions");
    $req_reponse = $bd->query("SELECT COUNT(*) AS nombre FROM questions");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .h3-admin,p{
            text-align:center;            
            font-size:1.2em;
        }
        .h3-admin{
            color:dodgerblue;
        }
    </style>
</head>
<body>
<header>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link home " href="../index.html">Home Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link home " href="../Forum/forum1.php">My Forum</a>
            </li>                                 
            <li class="nav-item">
                <a class="nav-link deconnexion" href="../Users/deconnexion.php">Deconnexion</a>                
            </li>
        </ul>        
	</header>
    <div>
        <span><a href="#users">zone utilisateurs</a></span> &nbsp;
        <span><a href="#questions">zone question</a></span> &nbsp;
        <span><a href="#reponses">zone reponses</a></span> &nbsp;
        <span><a href="#statistique">zone statistique</a></span>
    </div>
    <div class="general">
        <div class="users">
            <h3 id="users" class="h3-admin">TABLE UTILISATEURS</h3>
            <table class="table">
                <thead class="table-dark">
                    <td>Nom</td>
                    <td>Prenom</td>
                    <td>Email</td>
                    <td>Mot de pass</td>
                    <td>Date Inscription</td>
                    <td colspan="2">Action</td>
                </thead>
                <tbody>
                    <?php foreach($requete1 as $rq){?>
                        <tr>
                            <td><?php echo $rq["nom"] ?></td>
                            <td><?php echo $rq["prenom"] ?></td>
                            <td><?php echo $rq["email"] ?></td>
                            <td><?php echo $rq["mot_de_pass"] ?></td>
                            <td><?php echo $rq["date_inscription"] ?></td>
                            <td><a href="update.php?id=<?php echo $rq['id']?>&name=user">Modifier</a></td>
                            <td><a href="delete.php?id=<?php echo $rq['id']?>&name=user">Supprimer</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div> 
        <div class="questions-admin">
            <h3 id="questions" class="h3-admin">TABLE QUESTIONS</h3>
            <table class="table">
                    <thead class="table-dark">
                        <td>Question</td>
                        <td>Date demande</td>                        
                        <td colspan="2">Action</td>
                    </thead>
                    <tbody>
                        <?php foreach($requete2 as $rq2){?>
                            <tr>
                                <td><?php echo $rq2["question"] ?></td>
                                <td><?php echo $rq2["date_demande"] ?></td>                                
                                <td><a href="update.php?id=<?php echo $rq2['id']?>&name=question">Modifier</a></td>
                                <td><a href="delete.php?id=<?php echo $rq2['id']?>&name=question">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
        <div class="reponses-admin">
            <h3 id="reponses" class="h3-admin">TABLE REPONSES</h3>
            <table class="table">            
                    <thead class="table-dark">
                        <td>Question</td>
                        <td>Reponses</td>
                        <td>Date reponse</td>                        
                        <td colspan="2">Action</td>
                    </thead>
                    <tbody>
                        <?php foreach($requete3 as $rq3){?>
                            <tr>
                                <td><?php echo $rq3["question"] ?></td>
                                <td><?php echo $rq3["reponse"] ?></td>
                                <td><?php echo $rq3["date_reponse"] ?></td>                                
                                <td><a href="update.php?id=<?php echo $rq3['id']?>&name=reponse">Modifier</a></td>
                                <td><a href="delete.php?id=<?php echo $rq3['id']?>&name=reponse">Supprimer</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>       
    <div id="statistique" class="statistique">
        <h3 id="reponses" class="h3-admin">STATISTIQUE</h3>
        <p>
            <span>Nombre utilisateurs :</span> <?php foreach($req_users as $r){ echo $r["nombre"]; }?>
        </p>
        <p>
            <span>Nombre question : </span> <?php foreach($req_question as $req){ echo $req["nombre"]; }?>
        </p>
        <p>
            <span>Nombre moyen de reponse : </span> <?php foreach($req_reponse as $re){ echo $re["nombre"]; }?>
        </p>
    </div>
</body>
</html>