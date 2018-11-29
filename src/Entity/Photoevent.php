<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Photoevent
 *
 * @ORM\Table(name="photoevent", indexes={@ORM\Index(name="image_photoevent_fk", columns={"Image_id"}), @ORM\Index(name="eventclub_photoevent_fk", columns={"EventClub_id"})})
 * @ORM\Entity
 */
class Photoevent
{
    /**
     * @var int
     *
     * @ORM\Column(name="PhotoEvent_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $photoeventId;

    /**
     * @var \Eventclub
     *
     * @ORM\ManyToOne(targetEntity="Eventclub")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="EventClub_id", referencedColumnName="EventClub_id")
     * })
     */
    private $eventclub;

    /**
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Image_id", referencedColumnName="Image_id")
     * })
     */
    private $image;


}
