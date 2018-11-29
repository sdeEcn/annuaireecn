<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventclub
 *
 * @ORM\Table(name="eventclub", indexes={@ORM\Index(name="clubs_eventclub_fk", columns={"Club_id"})})
 * @ORM\Entity
 */
class Eventclub
{
    /**
     * @var int
     *
     * @ORM\Column(name="EventClub_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventclubId;

    /**
     * @var string
     *
     * @ORM\Column(name="EventClub_titre", type="string", length=100, nullable=false)
     */
    private $eventclubTitre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EventClub_Description", type="string", length=255, nullable=true)
     */
    private $eventclubDescription;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EventClub_Date", type="date", nullable=false)
     */
    private $eventclubDate;

    /**
     * @var binary
     *
     * @ORM\Column(name="EventClub_Recurrence", type="binary", nullable=false)
     */
    private $eventclubRecurrence;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EventClub_HeureDebut", type="time", nullable=false)
     */
    private $eventclubHeuredebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="EventClub_HeureFin", type="time", nullable=false)
     */
    private $eventclubHeurefin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EventClub_lieu", type="string", length=100, nullable=true)
     */
    private $eventclubLieu;

    /**
     * @var \Clubs
     *
     * @ORM\ManyToOne(targetEntity="Clubs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Club_id", referencedColumnName="Club_id")
     * })
     */
    private $club;


}
