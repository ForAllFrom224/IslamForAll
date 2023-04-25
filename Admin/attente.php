<?php 
    $fichiers = scandir("../tmp");
    
    if(isset($_GET['valide'])){  
        $index = $_GET['valide'];
        echo $index;
        $file = $fichiers[$index];
        $etat = rename("../tmp/$file", "../docs/$file");

        if($etat)
            header("Location: attente.php");
        else
            echo "<div>Il y'a eu un problème</div>";
    }else if(isset($_GET['supprime'])){
        $index_ = $_GET['supprime'];
        $etat = unlink("../tmp/$fichiers[$index_]");

        if($etat)
            header("Location: attente.php");
        #echo "<script>alert('yes supprime')</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table class="table table-dark">
            <thead>
                <th>Fichiers (cliqué pour lire)</th>
                <th colspan="2">Actions</th>
            </thead>
            <tbody>
                <?php for ($i=2; $i < count($fichiers) ; $i++) {?>
                    <tr>
                        <td><a href="../tmp/<?php echo $fichiers[$i]; ?>"><?php echo $fichiers[$i]; ?></a></td>                        
                        <td><a href='attente.php?<?php echo 'valide'; ?>=<?php echo "$i"; ?>' class="btn btn-success">Valider</a></td>
                        <td><a href='attente.php?<?php echo 'supprime'; ?>=<?php echo "$i"; ?>' class="btn btn-danger">Supprimer</a></td>                                                                    
                    </tr>
                <?php } ?>               
            </tbody>
        </table>
    </div>
</body>
</html>