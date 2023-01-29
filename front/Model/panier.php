<?php
class Panier {

    private ?int $idPlat = null;
    private ?string $nomP = null;
    private ?string $prixP = null;
    private ?string $imgP = null; 

    public function __construct($id = null, $n, $p, $i)
    {
        $this->idPlat = $id;
        $this->nomP  = $n;
        $this->prixP = $p;
        $this->imgP = $i;
      
    }
    /**
     * Get the value of idClient
     */
    public function getIdPlat()
    {
        return $this->idPlat;
    }

    /**
     * Get the value of lastName
     */
    public function getNomP()
    {
        return $this->nomP;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setNomP($nomP)
    {
        $this->nomP = $nomP;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getPrixP ()
    {
        return $this->prixP ;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setPrixP ($prixP )
    {
        $this->prixP  = $prixP ;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getImgP()
    {
        return $this->imgP;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setImgP($imgP)
    {
        $this->imgP = $imgP;

        return $this;
    }

   


}

?>