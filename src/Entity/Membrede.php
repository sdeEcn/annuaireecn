<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Membrede
 *
 * @ORM\Table(name="membrede", indexes={@ORM\Index(name="clubs_membrede_fk", columns={"Club_id"}), @ORM\Index(name="eleves_membrede_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Membrede
{
    /**
     * @var int
     *
     * @ORM\Column(name="MembreDe_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $membredeId;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="MembreDe_DateDebut", type="date", nullable=true)
     */
    private $membredeDatedebut;

    /**
     * @var \Clubs
     *
     * @ORM\ManyToOne(targetEntity="Clubs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Club_id", referencedColumnName="Club_id")
     * })
     */
    private $club;

    /**
     * @var \Eleves
     *
     * @ORM\ManyToOne(targetEntity="Eleves")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eleve_id", referencedColumnName="Eleve_id")
     * })
     */
    private $eleve;


}
