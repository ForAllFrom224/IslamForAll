<?php
    session_start();
    $_SESSION['id'] = $_SESSION['idUser'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/users.css?jkjd">
    <title>Document</title>
</head>
<body>
    <header>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="../index.html">Home Page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="forum2.php">My Forum</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">My questions</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">My Answers</a>
            </li>                                  
            <li class="nav-item">
                <a class="nav-link disabled">Deconnexion</a>
            </li>
        </ul>
	</header>
    <h1 class="welcome">BIENVENUE <span id="name_user"><?php echo $_SESSION['lastname']." ".$_SESSION['firstname']; ?></h1></span>
</body>
</html>