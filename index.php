<?php
session_start();
require_once 'config.php';
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['signup']) && !empty($_POST['pseudo1']) && !empty($_POST['email1']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
    $pseudo1 = htmlspecialchars($_POST['pseudo1']);
    $mail = htmlspecialchars($_POST['email1']);
    $pswd1 =md5(htmlspecialchars($_POST['password1']));
    $pswd2 =md5(htmlspecialchars($_POST['password2']));
    $erreurs=[];
    // Validation des données
    // if(!preg_match("/^[a-zA-Zàéùè -]{2,100}$/", $pseudo)) {
    //     array_push($erreurs,"veuillez entrer un nom d'utilisateur valide");
    // }
    // if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
    //     array_push($erreurs,"l'e-mail n'est pas valide");
    // }
    // if (strlen($pswd1)>256 && strlen($pswd2)>256) {
    //     array_push($erreurs,"le mot de passe ne doit pas depasser 256 caracteres");
    // }
    // if ($pswd1!=$pswd2){
    //     array_push($erreurs,"les mots de passes sont different");
    //     }
        if(count($erreurs)==0){
          // Insertion des infos de l'utilisateur dans la base de données
        $insert = $bdd->prepare("INSERT INTO utilisateurs (nom,email,mot_de_passe) VALUES (:nom, :email, :password)");
        $insert->execute(array(
            'nom' => $pseudo1,
            'email' => $mail,
            'password' => $pswd1
        ));
            echo "Bravo votre inscription réussie !";
    }else {
        foreach ($erreurs as $error) {
            echo "<ul><li> $error</li></ul>";
        }  
        }
    }
    if (isset($_POST['connect']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $email =htmlspecialchars($_POST['email']);
    $pass =md5(htmlspecialchars($_POST['password']));
    //Faire une requete preparée et l'executer
    $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $query->execute(array('email' => $email));
    //Verifier si la requete a renvoyer une ligne pour confirmer que l'utilisateur existe dans la BDD
    if ($query->rowCount() == 1) {
        $user = $query->fetch();
        $_SESSION['utilisateur']= $user;
            header("location:dashbord.php");
        // echo "bravo ". $user['nom']."votre connexion a reuissi !";
        // Stocker les données utilisateur dans une session "user"
        // $_SESSION['user'] = $user; 
        //rediriger l'utilisateur connecter dans la page 'user_list.php'
        // header("Location:user_list.php");
        // exit();
    } else {
        echo "Désolé, les identifiants que vous avez entrés sont incorrects.";
    }
   }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription et Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Création de compte et Connexion</h1><br>
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
                <a href="#">Mot de passe oublié?</a>
            </div>
        </form>
    </div>
</body>
</html>