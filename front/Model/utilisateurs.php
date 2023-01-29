<?php
class utilisateurs
{
    private ?int $id = null;
    private ?string $pseudo = null;
    private ?string $email = null;
    
    public function __construct($id = null, $p, $e,)
    {
        $this->id = $id;
        $this->pseudo = $p;
        $this->email= $e;
       
    }

    /**
     * Get the value of idClient
     */
    public function getIdt()
    {
        return $this->id;
    }

    /**
     * Get the value of pseudo
     */
    public function getpseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */
    public function setpseudo($pseudo)
    {
        $this->pseudo= $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email= $email;

        return $this;
    }

   

   

    

   
}
