<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ClubRepository")
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
     * @ORM\Column(type="string",nullable=True)
     */
    private $mail;

    /**
     * @ORM\Column(type="string",length=255,nullable=True)
     * @Assert\Url(message="L'URL '{{value}}' n'est pas valide!")
     */
    private $site;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bde = false;
    /**
     * @ORM\Column(type="boolean")
     */
    private $bds = false;
    /**
     * @ORM\Column(type="boolean")
     */
    private $bda = false;

    /**
     * @ORM\Column(type="text")
     */
    private $description = "";

    /**
     * @ORM\Column(type="boolean")
     */
    private $confidentialite = false; //true = visible par ses membres lors de la recherche (pas d'accès au contenu du club)

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Bureau",inversedBy="club")
     */
    private $bureau;

    /**
     * Eleve pouvant ajouter du contenu sur la page
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve")
     * @ORM\JoinTable(name="clubAdmins",joinColumns={@ORM\JoinColumn(name="club_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="admin_id",referencedColumnName="id")})
     */
    private $admin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ClubEleves", mappedBy="club",fetch="EXTRA_LAZY")
     */
    private $membres;


    public function __construct(string $nom, bool $confidentialite)
    {
        $this->nom = $nom;
        $this->confidentialite = $confidentialite;
        $this->admin = new ArrayCollection();
        $this->membres = new  ArrayCollection();
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
        $bureau->setClub($this);
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

    public function addAdmin(Eleve $admin)
    {
        $this->admin->add($admin);
    }

    public function removeAdmin(Eleve $admin)
    {
        $this->admin->remove($admin);
    }

    /**
     * @return ArrayCollection
     */
    public function getMembres()
    {
        return $this->membres;
    }

    /**
     * @param ArrayCollection $membres
     */
    public function setMembres($membres): void
    {
        $this->membres = $membres;
    }

    public function addMembres(ClubEleves $eleve)
    {
        $this->membres->add($eleve);
    }

    public function removeMembres(ClubEleves $eleve)
    {
        $this->membres->remove($eleve);
    }


    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function isBde()
    {
        return $this->bde;
    }

    /**
     * @param mixed $bde
     */
    public function setBde($bde): void
    {
        $this->bde = $bde;
    }

    /**
     * @return mixed
     */
    public function isBds()
    {
        return $this->bds;
    }

    /**
     * @param mixed $bds
     */
    public function setBds($bds): void
    {
        $this->bds = $bds;
    }

    /**
     * @return mixed
     */
    public function isBda()
    {
        return $this->bda;
    }

    /**
     * @param mixed $bda
     */
    public function setBda($bda): void
    {
        $this->bda = $bda;
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
     * @return mixed
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * @param mixed $site
     */
    public function setSite($site): void
    {
        $this->site = $site;
    }




}