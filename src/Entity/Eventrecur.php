<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventrecur
 *
 * @ORM\Table(name="eventrecur", indexes={@ORM\Index(name="eventclub_eventrecur_fk", columns={"EventClub_id"})})
 * @ORM\Entity
 */
class Eventrecur
{
    /**
     * @var int
     *
     * @ORM\Column(name="EventRecur_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventrecurId;

    /**
     * @var string
     *
     * @ORM\Column(name="EventRecur_typeRecur", type="string", length=100, nullable=false)
     */
    private $eventrecurTyperecur;

    /**
     * @var \Eventclub
     *
     * @ORM\ManyToOne(targetEntity="Eventclub")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EventClub_id", referencedColumnName="EventClub_id")
     * })
     */
    private $eventclub;


}
