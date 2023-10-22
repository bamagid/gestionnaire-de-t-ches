<?php 
require_once("config.php");
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['signup']) && !empty($_POST['pseudo1']) && !empty($_POST['email1']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
    $pseudo1 = htmlspecialchars($_POST['pseudo1']);
    $mail = htmlspecialchars($_POST['email1']);
    $pswd1 =md5(htmlspecialchars($_POST['password1']));
    $pswd2 =md5(htmlspecialchars($_POST['password2']));
    $erreurs=[];
    // Validation des données
    if(!preg_match("/^[a-zA-Z][a-zA-Zàéùè -]{2,100}$/", $pseudo1)) {
       array_push($erreurs,"veuillez entrer un nom d'utilisateur valide");
     }
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        array_push($erreurs,"l'e-mail n'est pas valide");
    }elseif (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $all_users=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=:mail");
        $all_users->execute(['mail'=>$mail]);
        if ($all_users->rowCount()>=1) {
            array_push($erreurs,"L'email que vous avez mis est deja associé a un compte");
        }
    }
    if (strlen($pswd1)>256 && strlen($pswd2)>256) {
        array_push($erreurs,"le mot de passe ne doit pas depasser 256 caracteres");
    }
    if ($pswd1!=$pswd2){
        array_push($erreurs,"les mots de passes sont different");
       }
        if(count($erreurs)===0){
          // Insertion des infos de l'utilisateur dans la base de données
        $insert = $bdd->prepare("INSERT INTO utilisateurs (nom,email,mot_de_passe) VALUES (:nom, :email, :password)");
        $insert->execute(array(
            'nom' => $pseudo1,
            'email' => $mail,
            'password' => $pswd1
        ));
            echo "Bravo votre inscription à réussie !";
    }
    }else {
        echo"Veuillez remplir tous les champs ";
    }}
