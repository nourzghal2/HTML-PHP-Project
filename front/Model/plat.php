<?php
class plat
{
    private ?int $id_plat = null;
    private ?string $Nomplat = null;
    private ?string $descP = null;
    private ?float $prix = null;
    private ?string $img = null;

    public function __construct( $n, $p, $a, $d)
    {
        $this->Nomplat= $n;
        $this->descP = $p;
        $this->prix= $a;
        $this->img = $d;
    }

    /**
     * Get the value of idlivreur
     */
    public function getIdplat()
    {
        return $this->id_plat;
    }
    public function setIdplat($id_plat)
    {
        $this->id_plat= $id_plat;
    }
    /**
     * Get the value of nom
     */
    public function getNomplat()
    {
        return $this->Nomplat;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */
    public function setNomplat($Nomplat)
    {
        $this->Nomplat = $Nomplat;
    }

    /**
     * Get the value of id_livraison
     */
    public function getdescP()
    {
        return $this->descP;
    }

    /**
     * Set the value of id_livraison
     *
     * @return  self
     */
    public function setdescP($descP)
    {
        $this->descP = $descP;
    }

    /**
     * Get the value of numero
     */
    public function getprix()
    {
        return $this->prix;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setprix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * Get the value of id_commande
     */
    public function getimg()
    {
        return $this->img;
    }

    /**
     * Set the value of id_commande
     *
     * @return  self
     */
    public function setimg($img)
    {
        $this->id_commande = $img;
    }
}
?>