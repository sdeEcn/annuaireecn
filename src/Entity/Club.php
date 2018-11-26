<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Club
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=155)
     */
    private $nom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $confidentialite=false; //true = visible par ses membres lors de la recherche (pas d'accès au contenu du club)

    public function getId(){
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @return boolean
     */
    public function getConfidentialite()
    {
        return $this->confidentialite;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param boolean $confidentialite
     */
    public function setConfidentialite($confidentialite): void
    {
        $this->confidentialite = $confidentialite;
    }




}