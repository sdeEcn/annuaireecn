<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Photodp
 *
 * @ORM\Table(name="photodp", indexes={@ORM\Index(name="image_photodp_fk", columns={"Image_id"}), @ORM\Index(name="eleves_photodp_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Photodp
{
    /**
     * @var int
     *
     * @ORM\Column(name="PhotoDP_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $photodpId;

    /**
     * @var \Eleves
     *
     * @ORM\ManyToOne(targetEntity="Eleves")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eleve_id", referencedColumnName="Eleve_id")
     * })
     */
    private $eleve;

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
