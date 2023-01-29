<?php

class Commande
{
    private ?int $idC = null;
    private ?string $nomC = null;
    private ?string $prixT = null;
    private ?DateTime $dateC = null;
    private ?string $cart = null;
    private ?string $id = null;
    

    public function __construct($id = null, $n, $p, $d, $c,$i)
    {
        $this->idC = $id;
        $this->nomC = $n;
        $this->prixT = $p;
        $this->dateC = $d;
        $this->cart = $c;
        $this->id = $i;
    }

    /**
     * Get the value of idClient
     */
    public function getIdCommande()
    {
        return $this->idC;
    }

    /**
     * Get the value of lastName
     */
    public function getNomC()
    {
        return $this->nomC;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setNomC($nomC)
    {
        $this->nomC= $nomC;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getPrixT()
    {
        return $this->prixT;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setPrixT($prixT)
    {
        $this->prixT = $prixT;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getDateC()
    {
        return $this->dateC;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDateC($dateC)
    {
        $this->dateC = $dateC;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($cart)
    {
        $this->cart = $cart;

        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }







}
