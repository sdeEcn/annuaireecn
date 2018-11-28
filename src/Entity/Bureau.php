<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 26/11/2018
 * Time: 13:54
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 */
class Bureau
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Club",inversedBy="bureau")
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id")
     */
    private $club;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\eleve")
     * @ORM\JoinColumn(name="president_id",referencedColumnName="id")
     */
    private $president;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\eleve")
     * @ORM\JoinColumn(name="viceprezint_id",referencedColumnName="id",nullable=true)
     */
    private $viceprezint;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\eleve")
     * @ORM\JoinColumn(name="viceprezext_id",referencedColumnName="id",nullable=true)
     */
    private $viceprezext;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\eleve")
     * @ORM\JoinColumn(name="secgen_id",referencedColumnName="id",nullable=true)
     */
    private $secgen;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\eleve")
     * @ORM\JoinColumn(name="tresorier_id",referencedColumnName="id",nullable=true)
     */
    private $tresorier;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return Club
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param Club $club
     */
    public function setClub($club): void
    {
        $this->club = $club;
    }

    /**
     * @return eleve
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * @param eleve $president
     */
    public function setPresident($president): void
    {
        $this->president = $president;
    }

    /**
     * @return eleve
     */
    public function getViceprezint()
    {
        return $this->viceprezint;
    }

    /**
     * @param eleve $viceprezint
     */
    public function setViceprezint($viceprezint): void
    {
        $this->viceprezint = $viceprezint;
    }

    /**
     * @return eleve
     */
    public function getViceprezext()
    {
        return $this->viceprezext;
    }

    /**
     * @param eleve $viceprezext
     */
    public function setViceprezext($viceprezext): void
    {
        $this->viceprezext = $viceprezext;
    }

    /**
     * @return eleve
     */
    public function getSecgen()
    {
        return $this->secgen;
    }

    /**
     * @param eleve $secgen
     */
    public function setSecgen($secgen): void
    {
        $this->secgen = $secgen;
    }

    /**
     * @return eleve
     */
    public function getTresorier()
    {
        return $this->tresorier;
    }

    /**
     * @param eleve $tresorier
     */
    public function setTresorier($tresorier): void
    {
        $this->tresorier = $tresorier;
    }


}