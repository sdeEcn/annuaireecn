<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Imagearticle
 *
 * @ORM\Table(name="imagearticle", indexes={@ORM\Index(name="image_imagearticle_fk", columns={"Image_id"}), @ORM\Index(name="article_imagearticle_fk", columns={"article_id"})})
 * @ORM\Entity
 */
class Imagearticle
{
    /**
     * @var int
     *
     * @ORM\Column(name="imart_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $imartId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="imart_ordre", type="integer", nullable=true)
     */
    private $imartOrdre;

    /**
     * @var \Article
     *
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="article_id", referencedColumnName="article_id")
     * })
     */
    private $article;

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
