<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagejournal
 *
 * @ORM\Table(name="imagejournal", indexes={@ORM\Index(name="image_imagejournal_fk", columns={"Image_id"}), @ORM\Index(name="clubs_imagejournal_fk", columns={"Club_id"})})
 * @ORM\Entity
 */
class Imagejournal
{
    /**
     * @var int
     *
     * @ORM\Column(name="ImageJournal_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imagejournalId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ImageJournal_Description", type="string", length=255, nullable=true)
     */
    private $imagejournalDescription;

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
