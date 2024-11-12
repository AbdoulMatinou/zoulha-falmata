<?php
require_once('../models/salleService.php');

$etService = new salleService();

if (isset($_GET['action']))
    $action = $_GET['action'];
if (isset($_POST['action']))
    $action = $_POST['action'];





if ($action == 'formsl') {
    Header('Location:../views/salle/formsl.php');
}

if ($action == 'listesl') {
    Header('Location:../views/salle/listesl.php');
}

if ($action == 'delete') {
    //recuperation des donnees
    $numero=$_GET['numero'];

    //appel du model
    $etService->delete($numero);

    //redirection vers la vue
    Header('Location:../views/salle/listesl.php?message=salle supprimé');
 
}




if ($action == 'ajout') {
    //1. recupertaion de donnees

    $numero = $_POST['numero'];
    $niveau = $_POST['niveau'];
    $libelle = $_POST['libelle'];
    $nombredetudiant = $_POST['nombredetudiant'];


    //2. Appel du model
    $etService->add($numero, $niveau, $libelle, $nombredetudiant);

    //3. appel de la vue
    Header('Location:../views/salle/listesl.php?message=salle ajouté');
}


if($action=='editslFormsl'){
    $numero=$_GET['numero'];
    Header('Location:../views/salle/editsl.php?numero='.$numero);
}




if ($action == 'modifier') {
    //1. recupertaion de donnees
    $numero = $_POST['numero'];
    $niveau = $_POST['niveau'];
    $libelle = $_POST['libelle'];
    $nombredetudiant = $_POST['nombredetudiant'];


    //2. Appel du model
    $etService->edit($numero, $niveau, $libelle, $nombredetudiant);

    //3. appel de la vue
    Header('Location:../views/salle/listesl.php?message=salle modifié');
}
