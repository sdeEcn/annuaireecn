<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\Table(name="article", indexes={@ORM\Index(name="clubs_article_fk", columns={"Club_id"}), @ORM\Index(name="eleves_article_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="article_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $articleId;

    /**
     * @var string
     *
     * @ORM\Column(name="article_lien", type="string", length=255, nullable=false)
     */
    private $articleLien;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="article_dateparution", type="date", nullable=false)
     */
    private $articleDateparution;

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
     * @var \Eleves
     *
     * @ORM\ManyToOne(targetEntity="Eleves")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Eleve_id", referencedColumnName="Eleve_id")
     * })
     */
    private $eleve;


}
