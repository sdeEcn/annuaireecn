<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Universites
 *
 * @ORM\Table(name="universites", indexes={@ORM\Index(name="pays_universites_fk", columns={"Pays_id"})})
 * @ORM\Entity
 */
class Universites
{
    /**
     * @var int
     *
     * @ORM\Column(name="Universite_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $universiteId;

    /**
     * @var string
     *
     * @ORM\Column(name="Universite_nom", type="string", length=100, nullable=false)
     */
    private $universiteNom;

    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Pays_id", referencedColumnName="Pays_id")
     * })
     */
    private $pays;


}
