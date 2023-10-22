<?php
session_start();
require_once("traitements/signup_action.php");
require_once("traitements/signin_action.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription et Connexion</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Création de compte et Connexion</h1><br>
    <?php if (!empty($erreurs)) {
         foreach ($erreurs as $error) {
            echo '<ul style="color: red;"><li> '. $error.' </li></ul>';
        }
    } ?>
    <div class="form_div">
        <form action="index.php" method="POST" class="form">
            <h2 class="h21">Créer un compte</h2><br>
            <label for="pseudo1" class="lab_pre">Nom d'utilisateur:</label><br>
            <input type="text" name="pseudo1" class="entrer" autocomplete="off" pattern="[a-zA-Zàéùè -]{2,50}" required><br>
            <label for="email1">Email:</label><br>
            <input type="email" name="email1" class="entrer" autocomplete="off" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}" required><br>
            <label for="password1">Mot de passe:</label><br>
            <input type="password" name="password1" class="entrer" required><br>
            <label for="password2">Confirmation:</label><br>
            <input type="password" name="password2" class="entrer" required><br>
            <button type="submit" name="signup">Créer un compte</button>
        </form>
        <hr>
        <form action="index.php" method="POST" class="form">
            <h2 class="h22">Connexion</h2>
            <label for="pseudo" class="label">Email: </label><br>
            <input type="email" name="email" class="entrer" autocomplete="off" class="entrer" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}" required> <br>
            <label for="password" class="label">Mot de passe : </label><br>
            <input type="password" name="password" autocomplete="off" class="entrer" required><br>
            <div class="foot">
                <button type="submit" name="connect">Se connecter</button>

                <a href="pswd_reset.php">Mot de passe oublié?</a>

            </div>
        </form>
    </div>
</body>
</html>