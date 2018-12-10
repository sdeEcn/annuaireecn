<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\EleveRepository")
 */
class Eleve implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=155)
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @ORM\Column(type="string",length=155)
     * @Assert\NotBlank()
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", unique=true,name="username")
     * @Assert\Email()
     * @Assert\NotBlank()
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve",mappedBy="messuiveurs")

     */
    private $messuivis;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Eleve",inversedBy="messuivis")
     * @ORM\JoinTable(name="suiveur",
     *     joinColumns={@ORM\JoinColumn(name="suivi_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="suiveur_id",referencedColumnName="id")})
     */
    private $messuiveurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Club",inversedBy="membres")
     */
    private $clubs;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string")
     */
    private $password;


    public function __construct(string $nom, string $prenom, string $mail)
    {
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->mail=$mail;
        $this->clubs=new ArrayCollection();
        $this->messuivis=new ArrayCollection();
        $this->messuiveurs=new ArrayCollection();

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
        $this->clubs->removeElement($club);
    }

    /**
     * @return ArrayCollection
     */
    public function getMessuivis()
    {
        return $this->messuivis;
    }

    /**
     * @param Eleve $suivi
     */
    public function setMessuivis(Eleve $suivi): void
    {
        $this->messuivis = $suivi;
    }


    public function getRoles(): array
    {
        $roles = $this->roles;

        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function addRoles(string $string){
        if(!array_search($string,$this->roles)){
            $this->roles[]=$string;
        }
    }

    public function removeRole(string $role){
        $i = array_search($role,$this->roles);
        if($i){
            unset($this->roles[$i]);
            return true;
        }
        return false;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
    }


    public function setPassword(string $pass)
    {
        $this->password = $pass;
    }

    public function getUsername()
    {
        return $this->mail;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return ArrayCollection
     */
    public function getMessuiveurs()
    {
        return $this->messuiveurs;
    }

    /**
     * @param ArrayCollection $messuiveurs
     */
    public function setMessuiveurs($messuiveurs): void
    {
        $this->messuiveurs = $messuiveurs;
    }

    public function addSuiveur(Eleve $suivi){
        $this->messuiveurs->add($suivi);
    }

    public function removeSuiveur(Eleve $suivi){
        $this->messuiveurs->removeElement($suivi);
    }






    public function checkPassword($pwd, &$errors) {
        $errors_init = $errors;

        if (strlen($pwd) < 8) {
            $errors[] = "Mot de passe trop court!";
        }

        if (!preg_match("#[0-9]+#", $pwd)) {
            $errors[] = "Le mot de passe doit contenir au moins un chiffre!";
        }

        if (!preg_match("#[a-zA-Z]+#", $pwd)) {
            $errors[] = "Le mot de passe doit contenir au moins une lettre!";
        }
        else if (!preg_match("#[a-z]+#", $pwd)) {
            $errors[] = "Le mot de passe doit contenir au moins une lettre minuscule!";
        }
        else if (!preg_match("#[A-Z]+#", $pwd)) {
            $errors[] = "Le mot de passe doit contenir au moins une lettre majuscule!";
        }

        return ($errors == $errors_init);
    }



    public function encodePassword(UserPasswordEncoderInterface $passwordEncoder):string
    {
        $encoded = $passwordEncoder->encodePassword(
            $this,
            $this->getPassword()
        );
        return $encoded;
    }

    public function encodePassword1(UserPasswordEncoderInterface $passwordEncoder, string $test):string
    {
        $encoded = $passwordEncoder->encodePassword(
            $this,
            $test
        );
        return $encoded;
    }
}