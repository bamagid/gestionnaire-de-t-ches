<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if (isset($_POST['connect']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $email =htmlspecialchars($_POST['email']);
    $pass =md5(htmlspecialchars($_POST['password']));
    //Faire une requete preparée et l'executer
    $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = :email AND mot_de_passe = :mdp ");
    $query->execute(array(
        'email' => $email,
        'mdp'=>$pass
));
    //Verifier si la requete a renvoyer une ligne pour confirmer que l'utilisateur existe dans la BDD
    if ($query->rowCount() == 1) {
        $user = $query->fetch();
        $_SESSION['utilisateur']= $user;
            header("location:dashbord.php");
    } else {
        echo "Désolé, les identifiants que vous avez entrés sont incorrects.";
    }
   }

}