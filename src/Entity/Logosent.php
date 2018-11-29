<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Logosent
 *
 * @ORM\Table(name="logosent", indexes={@ORM\Index(name="image_logosent_fk", columns={"Image_id"}), @ORM\Index(name="entreprise_logosent_fk", columns={"Entreprise_id"})})
 * @ORM\Entity
 */
class Logosent
{
    /**
     * @var int
     *
     * @ORM\Column(name="LogoEnt_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $logoentId;

    /**
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Entreprise_id", referencedColumnName="Entreprise_id")
     * })
     */
    private $entreprise;

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
