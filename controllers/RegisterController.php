<?php
require_once("../models/Provider.php");

class RegisterController {
    private $connexion;

    function __construct() {
        $provider = new Provider();
        $this->connexion = $provider->getConnection();
    }

    public function register($nom, $motpasse) {
        $stmt = $this->connexion->prepare("INSERT INTO utilisateur (nom, motpasse) VALUES (:nom, :motpasse)");
        return $stmt->execute([
            'nom' => $nom,
            'motpasse' => $motpasse 
        ]);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $motpasse = $_POST['motpasse'];

    $register = new RegisterController();
    if ($register->register($nom, $motpasse)) {
        header("Location:../views/index.php");
    } else {
        echo "Erreur lors de l'inscription";
    }
}
?>
