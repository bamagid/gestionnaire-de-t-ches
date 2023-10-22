<?php
require_once("traitements/manage_task.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details de tâches</title>
    <link rel="stylesheet" href="styles/details_task.css">
</head>

<body>
    <div class="header">
        <h1>Gestion de mes Tâches</h1><br>
        <p><?= $_SESSION['utilisateur']['nom'];?></p>
    </div>
    <div class="taches">
        <?php
        foreach ($details as $detail) { 
            echo'
         <h2>'.$detail['titre'].' </h2><br>
        <div class="color">
            <p class="p1"><b>Priorité : '.$detail['priorite'].'   </b></p>
            <p class="p2"><b>Statut : '.$detail['statut'].' </b></p>
            <p class="echeance"> Echeance :  '.$detail['echeance'].'</p>
        </div>
        <p> '.$detail['description'].'</p>
        
        <div class="manage_task">
            <form action="manage_task.php" method="POST">
                <button type="submit" class="button1" name="done"> Marquer comme terminée</button>
                <button type="submit" class="button2" name="delete"> Supprimer la tâche</button>
            </form>
        </div>
    ';
    }?>
    </div>
    <a href="dashbord.php">Retour a la liste des tâches</a>
</body>

</html>