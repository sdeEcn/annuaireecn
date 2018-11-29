<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Eventbde
 *
 * @ORM\Table(name="eventbde", indexes={@ORM\Index(name="eventclub_eventbde_fk", columns={"EventClub_id"})})
 * @ORM\Entity
 */
class Eventbde
{
    /**
     * @var int
     *
     * @ORM\Column(name="EventBde_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventbdeId;

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
