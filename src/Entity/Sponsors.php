<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Sponsors
 *
 * @ORM\Table(name="sponsors", indexes={@ORM\Index(name="clubs_sponsors_fk", columns={"Club_id"}), @ORM\Index(name="entreprise_sponsors_fk", columns={"Entreprise_id"})})
 * @ORM\Entity
 */
class Sponsors
{
    /**
     * @var int
     *
     * @ORM\Column(name="Sponsor_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sponsorId;

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
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Entreprise_id", referencedColumnName="Entreprise_id")
     * })
     */
    private $entreprise;


}
