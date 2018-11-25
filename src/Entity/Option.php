<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 24/11/2018
 * Time: 20:50
 */

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Option
{
    private $id;
    private $nom;
    private $eleve2;
    private $eleve3;

    public  function __construct(){
        $this->eleve2= new ArrayCollection();
        $this->eleve3= new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    public function getEleves2(): Collection
    {
        return $this->eleve2;
    }

    public function getEleves3(): Collection
    {
        return $this->eleve3;
    }


}