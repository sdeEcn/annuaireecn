<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Logoclub
 *
 * @ORM\Table(name="logoclub", indexes={@ORM\Index(name="image_logoclub_fk", columns={"Image_id"}), @ORM\Index(name="clubs_logoclub_fk", columns={"Club_id"})})
 * @ORM\Entity
 */
class Logoclub
{
    /**
     * @var int
     *
     * @ORM\Column(name="LogoClub_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $logoclubId;

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
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Image_id", referencedColumnName="Image_id")
     * })
     */
    private $image;


}
