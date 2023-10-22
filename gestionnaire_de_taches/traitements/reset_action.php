<?php 
session_start();
require_once("config.php");
if ($_SERVER['REQUEST_METHOD']="POST") {
    if (isset($_POST['reset1'])) {
    $mail_for_reset=htmlspecialchars($_POST['email1']);
    $new_password=md5(htmlspecialchars($_POST['passwordr1']));
    $confirm_password=md5(htmlspecialchars($_POST['passwordr2']));
    if ($new_password===$confirm_password) {
        $reset_verif=$bdd->prepare("SELECT * FROM utilisateurs WHERE email=:mail");
        $reset_verif->execute(array(
            'mail'=>$mail_for_reset
        ));
        if ($reset_verif->rowCount() === 1) {
            $update_password=$bdd->prepare("UPDATE utilisateurs SET mot_de_passe=:mdp WHERE email=:mail");
            $update_password->execute(array(
                'mdp'=>$new_password,
                'mail'=>$mail_for_reset
            ));
            echo "Bravo votre mot de passe a été changé avec succés!";
        }else {
            echo "Ce compte n'existe pas, si vous n'avez pas encore de compte veuillez en ouvrir un merci! ";
        }
    }else {
        echo "Veuillez saisir des mots de passe identiques";
    }
    }
}
