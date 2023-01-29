<?php
class Commentaire {

    private ?int $id_com = null;
    private ?string $com= null;
    private ?int $id_article = null;
    private ?DateTime $date = null; 
    private ?string $id1 = null;

    public function __construct($id = null, $co, $id_article ,  $dt, $id1)
    {
        $this->id_com = $id;
        $this->com  = $co;
        $this->id_article = $id_article ; 
        $this->date= $dt;
        $this->id1= $id1;
      
    }
    /**
     * Get the value of idClient
     */
    public function getid_commentaire()
    {
        return $this->id_com;
    }

    
    /**
     * Get the value of lastName
     */
    public function getCommentaire()
    {
        return $this->com;
    }

    /**
     * Get the value of lastName
     */
    public function getId_article()
    {
        return $this->id_article;
    }

    

    

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setCommentaire($com)
    {
        $this->com= $com;

        return $this;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setId_article($id_article)
    {
        $this->id_article= $id_article;

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
    public function getId()
    {
        return $this->id1;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setId($id1)
    {
        $this->id1= $id1;

        return $this;
    }

   
   

}

?>