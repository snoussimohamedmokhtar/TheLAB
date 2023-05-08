<?php
class formateur
{
    private ?int $idformateur = null;
    private ?string $lastName = null;
    private ?string $firstName = null;
    private ?string $address = null;
    private ?DateTime $dob = null;
    private ?string $pd_img = null;

    public function __construct($id = null, $n, $p, $a, $d, $im)
    {
        $this->idformateur = $id;
        $this->lastName = $n;
        $this->firstName = $p;
        $this->address = $a;
        $this->dob = $d;
        $this->pd_img = $im;
    }

    /**
     * Get the value of idformateur
     */
    public function getIdformateur()
    {
        return $this->idformateur;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

public function getpd_img()
{
    return $this->pd_img;
}

/**
 * Set the value of firstName
 *
 * @return  self
 */
public function setpd_img($pd_img)
{
    $this->pd_img = $pd_img;

    return $this;
}
}