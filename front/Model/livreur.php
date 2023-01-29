<?php
class Livreur
{

    private  $nom ;
    private  $numero ;

    public function __construct($n,$d)
    {
       
     
        $this->nom = $n;
        $this->numero = $d;
    }

    public function getnom()
    {
        return $this->nom;
    }


    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getnumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */
    public function setnumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }


    
}
?>