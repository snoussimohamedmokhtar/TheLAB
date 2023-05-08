<?php
class livraison
{
    private ?string $idLivreur = null;
    private ?int $numCmd = null;
    private ?int $prixLiv = null;
    private ?string $adresse = null;
    private ?DateTime $dateLiv = null;
   

    public function __construct($id = null, $t, $p, $a, $d)
    {
        $this->idLivreur = $id;
        $this->numCmd = $t;
        $this->prixLiv = $p;
        $this->adresse = $a;
        $this->dateLiv = $d;
    }

    /**
     * Get the value of idLivreur
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * Get the value of lastName
     */
    public function getnumCmd()
    {
        return $this->numCmd;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setnumCmd($numCmd)
    {
        $this->numCmd= $numCmd;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getprixLiv()
    {
        return $this->prixLiv;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setprixLiv($prixLiv)
    {
        $this->prixLiv = $prixLiv;

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
     * Set the value of adresse
     *
     * @return  self
     */
    public function setadresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getdate()
    {
        return $this->dateLiv;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setdate($dateLiv)
    {
        $this->dateLiv = $dateLiv;

        return $this;
    }
}
