<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass="App\Repository\EleveRepository")
 */
class eleve
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=155)
     */
    private $nom;

    /**
     * @ORM\Column(type="string",length=155)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer",nullable=true)
     */
    private $promo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\pdprofil")
     */
    private $pdprofil;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Option")
     * @ORM\JoinColumn(name="option2",referencedColumnName="id",nullable=true)
     */
    private $option2;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Option")
     * @ORM\JoinColumn(name="option3",referencedColumnName="id",nullable=true)
     */
    private $option3;

    /**
     * @return integer
     */
    public function getId()
    {
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
     * @param string $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return integer
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * @param integer $promo
     */
    public function setPromo($promo): void
    {
        $this->promo = $promo;
    }

    /**
     * @return pdprofil
     */
    public function getPdprofil()
    {
        return $this->pdprofil;
    }

    /**
     * @param pdprofil $pdprofil
     */
    public function setPdprofil($pdprofil): void
    {
        $this->pdprofil = $pdprofil;
    }

    /**
     * @return option
     */
    public function getOption2()
    {
        return $this->option2;
    }

    /**
     * @param option $option2
     */
    public function setOption2($option2): void
    {
        $this->option2 = $option2;
    }

    /**
     * @return option
     */
    public function getOption3()
    {
        return $this->option3;
    }

    /**
     * @param option $option3
     */
    public function setOption3($option3): void
    {
        $this->option3 = $option3;
    }



}