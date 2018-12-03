<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


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
     * @ORM\Column(type="boolean")
     */
    private $confidentialite=false; //true = visible par ses membres lors de la recherche (pas d'accès au contenu du club)

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
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve", mappedBy="clubs")
     *@ORM\JoinTable(name="membresClub",joinColumns={@ORM\JoinColumn(name="club_id",referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="membre_id",referencedColumnName="id")})
     */
    private $membres;



    public function __construct(string $nom, bool $confidentialite)
    {
        $this->nom=$nom;
        $this->confidentialite=$confidentialite;
        $this->admin= new ArrayCollection();
        $this->membres=new  ArrayCollection();
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

    public function addAdmin(Eleve $admin){
        $this->admin->add($admin);
    }

    public function removeAdmin(Eleve $admin){
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

    public function addMembres(Eleve $eleve){
        $this->membres->add($eleve);
    }

    public function removeMembres(Eleve $eleve){
        $this->membres->remove($eleve);
    }



}