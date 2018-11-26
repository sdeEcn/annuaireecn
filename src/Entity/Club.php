<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bureau",inversedBy="club")
     */
    private $bureau;

    /**
     * Eleve pouvant ajouter du contenu sur la page
     * @ORM\ManyToMany(targetEntity="App\Entity\eleve")
     * @ORM\JoinTable(name="clubAdmins",joinColumns={@ORM\JoinColumn(name="club_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="admin_id",referencedColumnName="id")})
     */
    private $admin;

    public function __construct()
    {
        $this->admin= new ArrayCollection();
    }

    /**
     * @return integer
     */
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

    /**
     * @return bureau
     */
    public function getBureau()
    {
        return $this->bureau;
    }

    /**
     * @param bureau $bureau
     */
    public function setBureau($bureau): void
    {
        $this->bureau = $bureau;
    }

    /**
     * @return ArrayCollection
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param ArrayCollection $admin
     */
    public function setAdmin($admin): void
    {
        $this->admin = $admin;
    }




}