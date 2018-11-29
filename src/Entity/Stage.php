<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Stage
 *
 * @ORM\Table(name="stage", indexes={@ORM\Index(name="entreprise_stage_fk", columns={"Entreprise_id"}), @ORM\Index(name="eleves_stage_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Stage
{
    /**
     * @var int
     *
     * @ORM\Column(name="Stage_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stageId;

    /**
     * @var string
     *
     * @ORM\Column(name="Stage_type", type="string", length=20, nullable=false)
     */
    private $stageType;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Stage_date", type="date", nullable=true)
     */
    private $stageDate;

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
     * @var \Entreprise
     *
     * @ORM\ManyToOne(targetEntity="Entreprise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Entreprise_id", referencedColumnName="Entreprise_id")
     * })
     */
    private $entreprise;


}
