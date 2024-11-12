<?php
session_start();
require_once("../models/Provider.php");

class AuthentificateCtrl {
    private $connexion;

    function __construct() {
        $provider = new Provider();
        $this->connexion = $provider->getConnection();
    }

    public function authentification($nom, $motpasse) {
        $hts = $this->connexion->prepare("SELECT * FROM utilisateur WHERE nom = :nom AND motpasse = :motpasse");
        $hts->execute(['nom' => $nom, 'motpasse' => md5($motpasse)]);
        return $hts->fetch(PDO::FETCH_ASSOC);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $motpasse = $_POST['motpasse'];

    $nv = new AuthentificateCtrl();
    $utilisateur = $nv->authentification($nom, $motpasse);

    if ($utilisateur) {
        $_SESSION['utilisateur'] = $utilisateur;
        header("Location: ../Views/Acceuil.php"); 
    } else {
        $error = "Nom de l'utilisateur ou le mot de passe est incorrect";
        header("Location: index.php?error=" . urlencode($error));
    }
}
?>
