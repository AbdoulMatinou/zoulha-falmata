<?php
require_once('../models/enseignantService.php');

$etService = new enseignantService();

if (isset($_GET['action']))
    $action = $_GET['action'];
if (isset($_POST['action']))
    $action = $_POST['action'];





if ($action == 'formens') {
    Header('Location:../views/enseignant/formens.php');
}

if ($action == 'listeens') {
    Header('Location:../views/enseignant/listeens.php');
}

if ($action == 'delete') {
    //recuperation des donnees
    $matricule=$_GET['matricule'];

    //appel du model
    $etService->delete($matricule);

    //redirection vers la vue
    Header('Location:../views/enseignant/listeens.php?message=enseignant supprimé');
 
}




if ($action == 'ajout') {
    //1. recupertaion de donnees
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $egmail = $_POST['egmail'];
    $addresse = $_POST['addresse'];


    //2. Appel du model
    $etService->add($matricule, $nom, $prenom, $sexe, $egmail, $addresse);

    //3. appel de la vue
    Header('Location:../views/enseigment/listeens.php?message=enseigment ajouté');
}


if($action=='editensFormens'){
    $matricule=$_GET['matricule'];
    Header('Location:../views/enseigment/editens.php?matricule='.$matricule);
}




if ($action == 'modifier') {
    //1. recupertaion de donnees
    $nom = $_POST['nom'];
    $matricule = $_POST['matricule'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $ddn = $_POST['ddn'];
    $tel = $_POST['tel'];


    //2. Appel du model
    $etService->edit($matricule, $nom, $prenom, $sexe, $tel, $egmail, $addresse);

    //3. appel de la vue
    Header('Location:../views/enseigment/listeens.php?message=enseigment modifié');
}
