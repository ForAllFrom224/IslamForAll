<?php
    include("../Private/conDB.php");

    $requete1 = $bd->query("SELECT * FROM users");
    $req_users = $bd->query("SELECT COUNT(*) AS nombre FROM users");

    $requete2 = $bd->query("SELECT * FROM questions JOIN users 
            WHERE questions.id_user = users.id");
    $req_question = $bd->query("SELECT COUNT(*) AS nombre FROM questions");

    $requete3 = $bd->query("SELECT * FROM answers JOIN questions JOIN users 
            WHERE answers.id_question = questions.id AND answers.id_user = users.id");
    $req_reponse = $bd->query("SELECT COUNT(*) AS nombre FROM answers");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/users.css">
    <title>admin-islam</title>
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
    <!-- pour que le probleme fonctionne il faut se documenter sur les utilisatiion de CASCAE ou ON DELETE -->
    <header>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link home-page " href="../index.html">Home Page</a>
            </li>                                            
            <li class="nav-item">
                <a class="nav-link deconnexion" href="../Users/deconnexion.php">Deconnexion</a>                
            </li>
        </ul>        
	</header>
    <center>
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
                    <?php foreach($requete1 as $rq1){?>
                        <tr>
                            <td><?php echo $rq1["nom"] ?></td>
                            <td><?php echo $rq1["prenom"] ?></td>
                            <td><?php echo $rq1["email"] ?></td>
                            <td><?php echo $rq1["mot_de_pass"] ?></td>
                            <td><?php echo $rq1["date_inscription"] ?></td>
                            <td><a href="update.php?id=<?php echo $rq1['id']?>&name=user">Modifier</a></td>
                            <!-- <td><a href="delete.php?id=<?php echo $rq1['id']?>&name=user">Supprimer</a></td> -->                            
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
                        <td>Prenom</td>
                        <td>Nom</td>
                        <td>Date demande</td>                        
                        <td colspan="2">Action</td>
                    </thead>
                    <tbody>
                        <?php foreach($requete2 as $rq2){?>
                            <tr>                               
                                <td><?php echo $rq2["question"] ?></td>
                                <td><?php echo $rq2["prenom"] ?></td>
                                <td><?php echo $rq2["nom"] ?></td>
                                <td><?php echo $rq2["date_demande"] ?></td>                                
                                <td><a href="update.php?id=<?php echo $rq2['id']?>&name=question">Modifier</a></td>
                                <td><a href="delete.php?id=<?php echo $rq2['id']?>&name=question">Supprimer</a></td>
                                <!-- <td>
                                    <form action="delete.php" method="post">
                                        <input type="submit" name="delete" value="Delete">
                                        <input type="hidden" name="id_com" value="<?php echo $rq2["id"];?>">
                                    </form>                                
                                </td> -->
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
                        <td>Prenom</td>
                        <!-- <td>Nom</td> -->
                        <td>Date reponse</td>                        
                        <td colspan="2">Action</td>
                    </thead>
                    <tbody>
                        <?php foreach($requete3 as $rq3){?>
                            <tr>
                                <td><?php echo $rq3["question"] ?></td>
                                <td><?php echo $rq3["reponse"] ?></td>
                                <td><?php echo $rq3["prenom"] ?></td>
                                <!-- <td><?php echo $rq3["nom"] ?></td> -->
                                <td><?php echo $rq3["date_reponse"] ?></td>                                
                                <td><a href="update.php?id=<?php echo $rq3['id']?>&name=reponse">Modifier</a></td>
                                <td><a href="delete.php?id=<?php echo $rq3['id']?>&name=reponse">Supprimer</a></td>
                                <!-- <td>
                                    <form action="delete.php" method="post">
                                        <input type="submit" name="delete" value="Delete">
                                        <input type="hidden" name="id_com" value="<?php echo $rq2["id"];?>">
                                    </form>                                
                                </td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>       
    <div id="statistique" class="statistique">
        <h3 id="reponses" class="h3-admin">ZONE STATISTIQUES</h3>
        <p>
            <span>Nombre utilisateurs :</span> <?php foreach($req_users as $r){ echo $r["nombre"]; }?>
        </p>
        <p>
            <span>Nombre question : </span> <?php foreach($req_question as $req){ echo $req["nombre"]; }?>
        </p>
        <p>
            <span>Nombre de reponse : </span> <?php foreach($req_reponse as $re){ echo $re["nombre"]; }?>
        </p>
    </div>
    </center>
</body>
</html>