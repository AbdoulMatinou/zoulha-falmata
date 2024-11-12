<?php
require_once('Provider.php');

class salleService
{
    private $connexion;

    function __construct()
    {
        $p = new Provider();
        $this->connexion = $p->getconnection();
    }


    public function add($numero, $niveau, $libelle, $nombredetudiant)
    {
        $requete = 'insert into salle (numero, niveau, libelle, nombredetudiant) values (:n, :nv, :lb, :nbreet)';
        $stat = $this->connexion->prepare($requete);
        $rs = $stat->execute([
            'n'=> $numero,
            'nv'=> $niveau,
            'lb'=> $libelle,
            'nbreet'=> $nombredetudiant
        ]);



    }

    public function editsl($numero, $niveau, $libelle, $nombredetudiant)
    {

        $requete='update salle set niveau=:nv, libelle=:lb, nombredetudiant=:ndreet where numero=:n';
        $stmt=$this->connexion->prepare($requete);
        $result=$stmt->execute([
            'nv'=> $niveau,
            'lb'=> $libelle,
            'nbreet'=> $nombredetudiant
            
        ]);

    }


    public function getBynumero($numero)
    {
        $requete="select * from salle where numero=:n";
        $stmt=$this->connexion->prepare($requete);
        $res=$stmt->execute([
            'n'=> $numero
        ]);
        $salle=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $salle[0];
    }

    public function getAll()
    {
        $requete = 'select * from salle order by numero desc';
        $st = $this->connexion->prepare($requete);
        $salle = $st->fetchAll(PDO::FETCH_ASSOC);
        return $salle;
    }

    public function delete($numero)
    {
        $requete='delete from salle where numero=:n';
        $sta=$this->connexion->prepare($requete);
        $res=$sta->execute([
            'n'=> $numero
        ]);
    }

}