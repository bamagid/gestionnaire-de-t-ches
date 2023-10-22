<?php
session_start();
require_once("config.php");
if (isset($_POST['deconnexion'])) {
    unset($_SESSION['utilisateur']);
    header("Location:index.php");
       ;}

if (isset($_SESSION['utilisateur'])) {
$_SESSION['utilisateur'];
$tache=$bdd->prepare("SELECT * FROM taches WHERE id_user= :user");
$tache->execute(array('user'=>$_SESSION['utilisateur']['id_user']));
$taches=$tache->fetchAll(PDO::FETCH_ASSOC);
$_SESSION['Taches']=$taches;
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST["ajout_task"]) && !empty($_POST['titre']) && !empty($_POST['date']) && !empty($_POST['priorite']) && !empty($_POST['statut']) && !empty($_POST['description'])) {
    $titre=htmlspecialchars($_POST['titre']);
    $echeance=htmlspecialchars($_POST['date']);
    $priorite=htmlspecialchars($_POST['priorite']);
    $statut=htmlspecialchars($_POST['statut']);
    $description=htmlspecialchars($_POST['description']);
    $id_user=$_SESSION['utilisateur']['id_user'];
    $current_time=date("Y-m-d H:i:s");
    $echeances=strtotime($echeance);
    $date = new DateTime();
    $date->setTimestamp($echeances);
    $date_formatte = $date->format("Y-m-d H:i:s");
    $errors=[];
    if (!is_string($titre) || strlen($titre)>100){
        $errors[]="Le titre est invalide (la longueur max du tire est de 100 caracteres)";
    }if (!is_string($description)) {
        $errors[]="La description doit etre une.des chaine.s de caractere";
    }
    if(!in_array($priorite, ['Haute','Moyenne','Basse'])){
        $errors[]="La priorité n'est pas valide, choix entre Haute, Moyenne ou Basse.";
    }
    if(!in_array($statut, ['En attente','En cours','Terminer']) ){
        $errors[]="Statut non reconnu, choix entre En attente,'En cours' ou 'Terminer'";
        }
        if ($date_formatte < $current_time) {
            $errors[] = "L'échéance ne doit pas etre dans le passé ! mettez une date valide pour l'echeance";
        }
        if (count($errors)===0){

        $ajout=$bdd->prepare("INSERT INTO taches (titre,echeance,priorite,statut,description,id_user) VALUES (:titre,:echeance,:priorite,:statut,:description,:id_user)");
        $ajout->execute(array(
            'titre'=>$titre,
            'echeance'=>$date_formatte,
            'priorite'=>$priorite,
            'statut'=>$statut,
            'description'=>$description,
            'id_user'=>$id_user
        )
        );
        $_SESSION['Taches']=$taches;
    header("location:dashbord.php");
    exit();
    }
    }else {
        echo "Remplisser tous les champs du formulaire";
    }
}}else{
 header("location:index.php");
 exit();
}