<?php
    include('menu.html');
    $element = scandir("../DOCS"); //retourne un tableau contenant le contenu du dossier    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css?">    
    <title>Document</title>
</head>
<body>
    <div class="line"></div>
    <h1 class="orange">Livre</h1>

    <section class="section-livre">
        <center>
            <table class="table table-striped table">
                <thead class="table-dark">                
                    <tr>
                        <th>Titre du Livre</th>
                        <th>Telecharger</th>
                    </tr>                
                </thead>
                <tbody>
                    <?php for($i = 3; $i < count($element); $i++) {?>
                        <tr>
                            <td><?php $contenu = explode(".",$element[$i]); echo $contenu[0];?></td>
                            <td><a href="<?php echo "../DOCS/".$element[$i];?>" class="download"><?php echo $element[$i];?></td></a>
                        </tr>
                    <?php } ?>        
                </tbody>
            </table>
        </center>
    </section>
</body>
</html>