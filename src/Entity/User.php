<?php

namespace App\Entity;

class User {

    public function __construct($nom = 'nom', $email = "email@exemple.com") 
    {
        $this->nom = $nom;
        $this->email = $email;
    }

    /** @var string */
    private $nom;
    
    /** @var string */
    private $email;

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}