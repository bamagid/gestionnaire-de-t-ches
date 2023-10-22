<?php
session_start();
require_once('config.php');
if ($_SERVER['REQUEST_METHOD']=='POST') {
    if (isset($_POST['details'])) {
        $id=intval($_POST['details']);
        $_SESSION["id"]=$id;
        $detail=$bdd->prepare("SELECT * FROM taches WHERE id=:id");
        $detail->execute(array('id'=>$id));
        $details= $detail->fetchAll(PDO::FETCH_ASSOC);

    }else{header("location:dashbord.php");}
}
$id_task1=$_SESSION["id"];
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
    ?>