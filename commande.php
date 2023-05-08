<?php
class commande
{
    private ?int $numCmd = null;
    private ?DateTime $dateEnvoi = null;
    private ?int $qnt = null;
    private ?int $prixCmd = null;
    private ?string $idclient = null;
   

    public function __construct($num = null, $de,$dc, $p, $id)
    {
        $this->numCmd = $num;
        $this->dateEnvoi = $de;
        $this->qnt = $dc;
        $this->prixCmd = $p;
        $this->idclient = $id;
    }

    /**
     * Get the value of numCmd
     */
    public function getnumCmd()
    {
        return $this->numCmd;
    }

    /**
     * Get the value of lastName
     */
    public function getdateEnvoi()
    {
        return $this->dateEnvoi;
    }
    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setdateEnvoi($dateEnvoi)
    {
        $this->dateEnvoi= $dateEnvoi;

        return $this;
    }
    /**
     * Get the value of qnt
     */
    public function getqnt()
    {
        return $this->qnt;
    }
    
    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setqnt($qnt)
    {
        $this->qnt = $qnt;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getprixCmd()
    {
        return $this->prixCmd;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setprixCmd($prixCmd)
    {
        $this->prixCmd = $prixCmd;

        return $this;
    }

    /**
     * Get the value of duree
     */
    public function getidclient()
    {
        return $this->idclient;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */
    public function setidClient($idclient)
    {
        $this->idclient = $idclient;

        return $this;
    }


}
