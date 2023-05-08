<?php
class formation
{
    private ?int $idformation = null;
    private ?string $typeformation = null;
    private ?string $discription = null;
    private ?string $Article = null;
    private ?string $pd_img = null;


   

    public function __construct($id = null, $t, $p, $d,$i)
    {
        $this->idformation = $id;
        $this->typeformation = $t;
        $this->discription = $p;
        $this->Article = $d;
        $this->pd_img = $i;
    }

    /**
     * Get the value of idformation
     */
    public function getIdformation()
    {
        return $this->idformation;
    }

    /**
     * Get the value of lastName
     */
    public function gettypeformation()
    {
        return $this->typeformation;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function settypeformation($typeformation)
    {
        $this->typeformation= $typeformation;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getdiscription()
    {
        return $this->discription;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setdiscription($discription)
    {
        $this->discription = $discription;

        return $this;
    }

    /**
     * Get the value of Article
     */
    public function getArticle()
    {
        return $this->Article;
    }

    /**
     * Set the value of Article
     *
     * @return  self
     */
    public function setArticle($Article)
    {
        $this->Article = $Article;

        return $this;
    }

    public function getpd_img()
    {
        return $this->pd_img;
    }

    /**
     * Set the value of Article
     *
     * @return  self
     */
    public function setpd_img($pd_img)
    {
        $this->pd_img = $pd_img;

        return $this;
    }
  
  

}
