<?php
class Article {

    private ?int $id_article = null;
    private ?string $nomAR = null;
    private ?string $imageAR = null;
    private ?DateTime $date = null; 

    public function __construct($id = null, $n, $img, $dt)
    {
        $this->id_article = $id;
        $this->nomAR   = $n;
        $this->imageAR = $img;
        $this->date= $dt;
      
    }
    /**
     * Get the value of idClient
     */
    public function getArticle()
    {
        return $this->id_article;
    }

    
    /**
     * Get the value of lastName
     */
    public function getNomA()
    {
        return $this->nomAR;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setNomA($nomAR)
    {
        $this->nomAR = $nomAR;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getImageAR ()
    {
        return $this->imageAR;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setImageAR ($imageAR)
    {
        $this->imageAR  = $imageAR ;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

   


}

?>