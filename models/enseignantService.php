<?php
require_once('Provider.php');

class enseignantService
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($matricule, $nom, $prenom, $sexe, $egmail,$ad)
    {
        $requete = 'insert into enseignant (matricule, nom, prenom, sexe,egmail, ad) values (:mat, :nm, :pr, :sx,:egmail, :ad)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'mat' => $matricule,
            'nm' => $nom,
            'pr' => $prenom,
            'sx' => $sexe,
            'egmail' => $egmail,
            'ad' => $ad

        ]);



    }

    public function editens($matricule, $nom, $prenom, $sexe, $egmail, $ad)
    {

        $requete='update enseignant set nom=:nm, prenom=:pr, sexe=:sx, egmail=:egmail, ad=:ad where matricule=:m';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nm'=> $nom,
            'pr'=> $prenom,
            'sx'=> $sexe,
            'egmail'=> $egmail,
            'ad'=> $ad,
            'm'=> $matricule
        ]);

    }


    public function getByMatricule($matricule)
    {
        $requete="select * from enseignant where matricule=:mat";
        $stmt=$this->connexion->prepare($requete);
        $res=$stmt->execute([
            'mat'=> $matricule
        ]);
        $enseignant=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $enseignant[0];
    }

    public function getAll()
    {
        $requete = 'select * from enseignant order by matricule desc';
        $st = $this->connexion->prepare($requete);
        $enseignant = $st->fetchAll(PDO::FETCH_ASSOC);
        return $enseignant;
    }

    public function delete($matricule)
    {
        $requete='delete from enseignant where matricule=:m';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'm'=> $matricule
        ]);
    }

}