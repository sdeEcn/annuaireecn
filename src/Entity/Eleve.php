<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity(repositoryClass="App\Repository\EleveRepository")
 */
class Eleve
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
     * @ORM\ManyToOne(targetEntity="Photo")
     */
    private $pdprofil;

    /**
     * @ORM\ManyToOne(targetEntity="Options")
     * @ORM\JoinColumn(name="option2",referencedColumnName="id",nullable=true)
     */
    private $option2;

    /**
     * @ORM\ManyToOne(targetEntity="Options")
     * @ORM\JoinColumn(name="option3",referencedColumnName="id",nullable=true)
     */
    private $option3;

    /**
     * @ORM\ManyToMany(targetEntity="Eleve",inversedBy="suivi")
     */
    private $suivi;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Club",inversedBy="membres")
     */
    private $clubs;


    public function __construct(string $nom, string $prenom, string $mail)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->mail=$mail;
        $this->clubs=new ArrayCollection();

    }

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
     * @return Photo
     */
    public function getPdprofil()
    {
        return $this->pdprofil;
    }

    /**
     * @param Photo $pdprofil
     */
    public function setPdprofil(Photo $pdprofil): void
    {
        $this->pdprofil = $pdprofil;
    }

    /**
     * @return Options
     */
    public function getOption2()
    {
        return $this->option2;
    }

    /**
     * @param Options $option2
     */
    public function setOption2(Options $option2): void
    {
        $this->option2 = $option2;
    }

    /**
     * @return Options
     */
    public function getOption3()
    {
        return $this->option3;
    }

    /**
     * @param Options $option3
     */
    public function setOption3(Options $option3): void
    {
        $this->option3 = $option3;
    }

    /**
     * @return ArrayCollection
     */
    public function getClubs()
    {
        return $this->clubs;
    }

    /**
     * @param Club $clubs
     */
    public function setClubs(Club $clubs): void
    {
        $this->clubs = $clubs;
    }

    public function addClubs(Club $club){
        $this->clubs->add($club);
    }

    public function removeClubs(Club $club){
        $this->clubs->remove($club);
    }



}