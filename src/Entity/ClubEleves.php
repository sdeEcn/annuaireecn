<?php
/**
 * Created by PhpStorm.
 * User: Alban
 * Date: 12/12/2018
 * Time: 16:18
 */

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity()
 */
class ClubEleves
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Eleve",inversedBy="clubs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eleve;

    /**
     * @ORM\ManyToOne(targetEntity="Club",inversedBy="membres")
     *  @ORM\JoinColumn(nullable=false)
     */
    private $club;

    /**
     * 0 = erreur, 1= adhésion demandée, 2=membre
     * @ORM\Column(type="integer")
     */
    private $status =0;

    /**
     * @ORM\Column(type="string",length=75)
     */
    private $relation = "Membre";

    /**
     * @return Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }

    /**
     * @param Eleve $eleve
     */
    public function setEleve(Eleve $eleve): void
    {
        $this->eleve = $eleve;
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
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * @param string $relation
     */
    public function setRelation(string $relation): void
    {
        $this->relation = $relation;
    }

    public function __construct(Eleve $eleve,Club $club)
    {
        $this->eleve=$eleve;
        $this->club=$club;
        if($club->getConfidentialite()){//si le club est caché
            $this->setStatus(1);
        }else{
            $this->setStatus(2);
        }
    }

    public function validate(){
        $this->setStatus(2);
    }

}