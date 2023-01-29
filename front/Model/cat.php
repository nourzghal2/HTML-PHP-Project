<?php
class cat
{
    private ?int $id_cat = null;
    private ?int $id_plat = null;
    private ?string $nom = null;
    private ?string $descr = null;
    private ?int $nbrplat = null;

    public function __construct( $n, $p, $a, $d)
    {
        $this->Nomplat= $n;
        $this->nom = $p;
        $this->descr= $a;
        $this->nbrplat = $d;
    }

    /**
     * Get the value of idlivreur
     */
    public function getNomplat()
    {
        return $this->Nomplat;
    }
    public function setIdplat($Nomplat)
    {
        $this->id_plat= $Nomplat;
    }
    /**
     * Get the value of nom
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->Nomplat = $Nomplat;
    }

    /**
     * Get the value of id_livraison
     */
    public function getdescr()
    {
        return $this->descr;
    }

    /**
     * Set the value of id_livraison
     *
     * @return  self
     */
    public function setdescr($descr)
    {
        $this->descr = $descr;
    }

    /**
     * Get the value of numero
     */
    public function getnbrplat()
    {
        return $this->nbrplat;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setnbrplat($nbrplat)
    {
        $this->nbrplat = $nbrplat;
    }

 
}
?>