<?php
class client
{
    private ?int $idclient = null;
    private ?string $firstname = null;
    private ?string $password = null;
    private ?string $adresse = null;
    private ?string $ville = null;
   

    public function __construct($id = null, $fn, $ad, $v, $p)
    {
        $this->idclient = $id;
        $this->firstname= $fn;
        $this->adresse = $ad;
        $this->ville = $v;
        $this->password = $p;
        
    }

    /**
     * Get the value of idclient
     */
    public function getIdclient()
    {
        return $this->idclient;
    }


/**
     * Get the value of first name
     */
    public function getfirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of first name
     *
     * @return  self
     */
    public function setfirstname($fn)
    {
        $this->firstname= $fn;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getadresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setadresse($adresse)
    {
        $this->adresse= $adresse;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getville()
    {
        return $this->ville;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setville($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get the value of duree
     */
    public function getpassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setpassword($password)
    {
        $this->password = $password;

        return $this;
    }


}
