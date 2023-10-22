<?php
require_once("actions/dashbord_action.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <link rel="stylesheet" href="styles/dashbord.css">
</head>

<body>

    <div class="header">
        <h1>Gestion de mes Tâches</h1><br>
        <p><?= $_SESSION['utilisateur']['nom'];?></p>
    </div>
    <form action="dashbord.php" class="form" method="post">
        <button type="submit" class="button" name="deconnexion" >Se deconnecter</button>
        </form>
    <div class="corps">
        <div class="scroll">
            <?php
                foreach ( $taches as $task) {
                    $id_task=$task['id'];
            echo '<div class="taches">
                <h2> '.$task['titre'].' </h2><br>
                <p>'.$task['description'].' </p>
                <div class="manage_task">
                    <p class="p1"><b>Priorité :'.$task['priorite'].' </b></p>
                    <p class="p2"><b>Statut : '.$task['statut'].' </b></p>
                    <p class="p3"><b>Echéance : '.$task['echeance'].' </b></p>
                    <form action="details_task.php" method="POST">
                    <button type="submit" name="details"value="'.$id_task.'">Voir les details</button>
                    </form>
                </div>
            </div>';
        }
            ?>
        </div>
        <div class="add_task">
        <?php
         if (!empty($errors)) {
            foreach ($errors as $error) {
               echo '<ul style="color: red;"><li> '. $error.' </li></ul>';
           }
       } 
        ?>
            <form action="dashbord.php" method="POST">
                <h2>Ajouter une nouvelle tâche</h2>
                <label for="titre">Titre:</label><br>
                <input type="text" name="titre"><br>
                <label for="date">Date d'echeanche:</label><br>
                <input type="datetime-local" name="date"><br>
                <label for="priorite">Priorite:</label><br>
                <select name="priorite">
                    <option value="Haute">Haute</option>
                    <option value="Moyenne">Moyenne</option>
                    <option value="Basse">Basse</option>
                </select><br>
                <label for="statut">Statut:</label><br>
                <select name="statut">
                    <option value="En attente">En attente</option>
                    <option value="En cours">En cours</option>
                    <option value="Terminer">Terminer</option>
                </select><br>
                <label for="description">Description:</label><br>
                <textarea name="description"></textarea><br>
                <button type="submit" name="ajout_task">Ajouter</button>
            </form>
        </div>
    </div>
</body>
</html>