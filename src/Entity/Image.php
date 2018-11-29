<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image")
 * @ORM\Entity
 */
class Image
{
    /**
     * @var int
     *
     * @ORM\Column(name="Image_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imageId;

    /**
     * @var string
     *
     * @ORM\Column(name="Image_nom", type="string", length=255, nullable=false)
     */
    private $imageNom;

    /**
     * @var string
     *
     * @ORM\Column(name="Image_lien", type="string", length=255, nullable=false)
     */
    private $imageLien;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Image_alt", type="string", length=255, nullable=true)
     */
    private $imageAlt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Image_creation", type="date", nullable=true)
     */
    private $imageCreation;


}
