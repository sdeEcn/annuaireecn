<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Cesure
 *
 * @ORM\Table(name="cesure", indexes={@ORM\Index(name="eleves_cesure_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Cesure
{
    /**
     * @var int
     *
     * @ORM\Column(name="Cesure_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cesureId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Cesure_annee", type="integer", nullable=true)
     */
    private $cesureAnnee;

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
