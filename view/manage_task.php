<?php
session_start();
require_once('config.php');
$id_task1=$_SESSION["id"];
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['done'])) {
        $update_task=$bdd->prepare("UPDATE taches SET statut=:statut WHERE id=:id");
        $update_task->execute(array(
            'statut'=>"Terminer",
            'id'=>$id_task1));
            $maj=$bdd->query("SELECT  * FROM taches");
            $taches=$maj->fetchAll();
            $_SESSION['Taches']= $taches;
            header('Location:dashbord.php');
    }elseif (isset($_POST['delete'])) {
        $delete_task=$bdd->prepare("DELETE FROM  taches WHERE id=:id");
        $delete_task->execute(array( 'id'=>$id_task1));
        $maj=$bdd->query("SELECT  * FROM taches");
            $taches=$maj->fetchAll();
            $_SESSION['Taches']= $taches;
            header('Location:dashbord.php');
    }
}