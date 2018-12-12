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
     * @ORM\OneToOne(targetEntity="App\Entity\Club",mappedBy="bureau")
     * @ORM\JoinColumn(name="club_id",referencedColumnName="id", onDelete="CASCADE")
     */
    private $club;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Eleve")
     * @ORM\JoinColumn(name="president_id",referencedColumnName="id")
     */
    private $president;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Eleve")
     * @ORM\JoinColumn(name="viceprezint_id",referencedColumnName="id",nullable=true)
     */
    private $viceprezint;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Eleve")
     * @ORM\JoinColumn(name="viceprezext_id",referencedColumnName="id",nullable=true)
     */
    private $viceprezext;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Eleve")
     * @ORM\JoinColumn(name="secgen_id",referencedColumnName="id",nullable=true)
     */
    private $secgen;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Eleve")
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
     * @return Eleve
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * @param Eleve $president
     */
    public function setPresident($president): void
    {
        $this->president = $president;
    }

    /**
     * @return Eleve
     */
    public function getViceprezint()
    {
        return $this->viceprezint;
    }

    /**
     * @param Eleve $viceprezint
     */
    public function setViceprezint($viceprezint): void
    {
        $this->viceprezint = $viceprezint;
    }

    /**
     * @return Eleve
     */
    public function getViceprezext()
    {
        return $this->viceprezext;
    }

    /**
     * @param Eleve $viceprezext
     */
    public function setViceprezext($viceprezext): void
    {
        $this->viceprezext = $viceprezext;
    }

    /**
     * @return Eleve
     */
    public function getSecgen()
    {
        return $this->secgen;
    }

    /**
     * @param Eleve $secgen
     */
    public function setSecgen($secgen): void
    {
        $this->secgen = $secgen;
    }

    /**
     * @return Eleve
     */
    public function getTresorier()
    {
        return $this->tresorier;
    }

    /**
     * @param Eleve $tresorier
     */
    public function setTresorier($tresorier): void
    {
        $this->tresorier = $tresorier;
    }


}