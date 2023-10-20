<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <link rel="stylesheet" href="dashbord.css">
</head>
<body>
    
    <div class="header">
        <h1>Gestion de mes Tâches</h1><br>
        <p>Saidou Diallo</p>
    </div>
    <div class="corps">
        <div class="scroll">
            <div class="taches">
                <h2>Preparation d'un rapport de vente </h2><br>
                <p>Recueillir les données de vente , generer des graphiques et rediger un rapport detaillée. </p>
                <div class="manage_task">
                    <p class="p1"><b>Priorité :Haute   </b></p>
                    <p class="p2"><b>Statut :En cours  </b></p>
                    <button><a href="#"> Voir les details </a></button>
                </div>
            </div>
        </div>
        <div class="add_task">
            <form action="">
                <h2>Ajouter une nouvelle tâche</h2>
                <label for="titre">Titre:</label><br>
                <input type="text" name="titre"><br>
                <label for="date">Date d'echeanche:</label><br>
                <input type="date" name="date"><br>
                <label for="priorite">Priorite:</label><br>
                <select name="priorite" >
                    <option value="">Haute</option>
                    <option value="">Moyenne</option>
                    <option value="">Basse</option>
                </select><br>
                <label for="statut">Statut:</label><br>
                <select name="statut" >
                    <option value="">En attente</option>
                    <option value="">En cours</option>
                    <option value="">Terminer</option>
                </select><br>
                <label for="description">Description:</label><br>
                <textarea name="description"></textarea><br>
                <button type="submit" name="ajout_task">Ajouter</button>
            </form>
        </div>
    </div>
</body>
</html>