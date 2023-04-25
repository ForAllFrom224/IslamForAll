<?php
    session_start();
    include("../Private/conDB.php");

    $requete1 = $bd->query("SELECT * FROM users");
    $req_users = $bd->query("SELECT COUNT(*) AS nombre FROM users");

    // $requete2 = $bd->query("SELECT * FROM questions WHERE is_delete = 0");
    $requete2 = $bd->query("SELECT * FROM questions WHERE is_delete_ques = 0");
    $req_question = $bd->query("SELECT COUNT(*) AS nombre FROM questions WHERE is_delete_ques = 0");

    // $requete3 = $bd->query("SELECT * FROM answers WHERE is_delete = 0");
    $requete3 = $bd->query("SELECT * FROM answers WHERE is_delete_rep = 0");
    $req_reponse = $bd->query("SELECT COUNT(*) AS nombre FROM answers WHERE is_delete_rep = 0");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
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
            <!-- <button type="button" class="btn btn-info position-relative">
                News docs
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo count(scandir("../tmp")) - 2; ?>
                    <span class="visually-hidden">unread messages</span>
                </span>
            </button>  -->
            <a class="btn btn-info position-relative" href="attente.php">
                News docs
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <?php echo count(scandir("../tmp")) - 2; ?>
                    <span class="visually-hidden">unread messages</span>
                </span>
            </a>
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
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Mot de pass</th>
                        <th>Date Inscription</th>
                        <th>Etat</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <?php foreach($requete1 as $rq1){?>
                            <tr>
                                <td><?php echo $rq1["nom"] ?></td>
                                <td><?php echo $rq1["prenom"] ?></td>
                                <td><?php echo $rq1["email"] ?></td>
                                <td><?php echo $rq1["mot_de_pass"] ?></td>
                                <td><?php echo $rq1["date_inscription"] ?></td>
                                <td><?php echo $rq1["is_active"] ?></td>
                                <td><a href="update.php?idU=<?php echo $rq1['id']?>&name=user" class="btn btn-info">Modifier</a></td>
                                <!-- <td><a href="delete.php?idU=<?php echo $rq1['id']?>&name=user" class="btn btn-danger">Actif/Non</a></td> -->
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="delete.php?idU=<?php echo $rq1['id']?>&name=user&etat=actif"><button type="button" class="btn btn-success" name="actif">Actif</button></a>
                                        <a href="delete.php?idU=<?php echo $rq1['id']?>&name=user&etat=delete"><button type="button" class="btn btn-danger" name="delete">Delete</button></a>
                                    </div>
                                </td>                                                                                   
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
                            <td>Nb reponse</td>                      
                            <td colspan="2">Action</td>
                        </thead>
                        <tbody>
                            <?php foreach($requete2 as $rq2){?>
                                <?php 
                                    $id_user = $rq2['id_user'];
                                    $requete = $bd->query("SELECT nom,prenom FROM users WHERE id = $id_user"); ?>                                                                
                                    <tr>                               
                                        <td><?php echo $rq2["question"]; ?></td>
                                        <td><?php foreach($requete as $r){ echo $r["prenom"]; ?></td>
                                        <td><?php echo $r["nom"]; }?></td>
                                        <td><?php echo $rq2["date_demande"]; ?></td>
                                        <td>Just After</td>                              
                                        <td><a href="update.php?idQ=<?php echo $rq2['id']?>&name=question" class="btn btn-info">Modifier</a></td>
                                        <td><a href="delete.php?idQ=<?php echo $rq2['id']?>&name=question" class="btn btn-danger">Supprimer</a></td>
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
                            <!-- <td>Question</td> -->
                            <td>Reponses</td>
                            <td>Prenom</td>
                            <td>Nom</td>
                            <td>Date reponse</td>                        
                            <td colspan="2">Action</td>
                        </thead>
                        <tbody>
                            <?php foreach($requete3 as $rq3){?>
                                <?php 
                                    $id_user_rep = $rq3['id_user'];
                                    $requete_rep = $bd->query("SELECT nom,prenom FROM users WHERE id = $id_user_rep"); ?>
                                <tr>
                                    <!-- <td><?php echo $rq3["question"]; ?></td> -->
                                    <td><?php echo $rq3["reponse"]; ?></td>
                                    <td><?php foreach($requete_rep as $req_rep){ echo $req_rep["prenom"]; ?></td>
                                    <td><?php echo $req_rep["nom"];} ?></td>
                                    <td><?php echo $rq3["date_reponse"]; ?></td>                                
                                    <td><a href="update.php?idR=<?php echo $rq3['id']?>&name=reponse" class="btn btn-info">Modifier</a></td>
                                    <td><a href="delete.php?idR=<?php echo $rq3['id']?>&name=reponse" class="btn btn-danger">Supprimer</a></td>
                                    <!-- <td>
                                        <form action="delete.php" method="post">
                                            <input type="submit" name="delete" value="Delete">
                                            <input type="hidden" name="id_com" value="<?php echo $rq3["id"];?>">
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