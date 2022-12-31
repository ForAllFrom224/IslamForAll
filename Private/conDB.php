<?php
    try {
        $bd = new PDO("mysql:host=localhost;dbname=islampourtous","islam","islam");
    } catch (PDOException $e) {
        $e->getMessage("Impossible de se connecter à la base de donnée");
    }
?>