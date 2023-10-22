<?php
try {
    $bdd = new PDO(
        'mysql:host=localhost:3307;dbname=gestionnaire_de_taches;charset=utf8',
        'root',
        'Magid'
       );
    // echo "Bravo la connexion a la base de données a reussi "."<br>";
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}