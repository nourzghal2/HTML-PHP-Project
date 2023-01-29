<?php
class Cart {

    private ?int $idCart = null;
    private ?string $nom = null;
    private ?string $prixCart = null;
    private ?string $quantite = null;
    private ?string $image = null; 

    public function __construct($id = null, $n, $p, $q, $i)
    {
        $this->idCart= $id;
        $this->nom = $n;
        $this->prixCart = $p;
        $this->quantite = $q;
        $this->image= $i;
      
    }
    /**
     * Get the value of idClient
     */
    public function getIdCart()
    {
        return $this->idCart;
    }

    /**
     * Get the value of lastName
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getPrixCart ()
    {
        return $this->prixCart ;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setPrixCart ($prixCart )
    {
        $this->prixCart  = $prixCart ;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setQuantitet($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getImageCart()
    {
        return $this->image;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setImageCart($image)
    {
        $this->image = $image;

        return $this;
    }

   


}

?>