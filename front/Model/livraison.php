<?php
class livraison
{

    private  $id_livreur ;
    private  $dateL ;
    private  $adresse ;
    private  $idC;

    public function __construct($a,$b,$n,$d)
    {
       
        $this->id_livreur = $a;
        $this->dateL = $b;
        $this->adresse = $n;
        $this->idC = $d;
    }

    public function getid_livreur()
    {
        return $this->id_livreur;
    }


    public function setid_livreur($id_livreur)
    {
        $this->id_livreur = $id_livreur;

        return $this;
    }


    public function getdateL()
    {
        return $this->dateL;
    }


    public function setdateL($dateL)
    {
        $this->dateL = $dateL;

        return $this;
    }


    
    public function getadresse()
    {
        return $this->adresse;
    }


    public function setadresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }


    

    
    public function getid_commande()
    {
        return $this->idC;
    }


    public function setid_commande($idC)
    {
        $this->idC = $idC;

        return $this;
    }


    
    
}
?>