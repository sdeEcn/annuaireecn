<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Stagecesure
 *
 * @ORM\Table(name="stagecesure", indexes={@ORM\Index(name="entreprise_stagecesure_fk", columns={"Entreprise_id"}), @ORM\Index(name="cesure_stagecesure_fk", columns={"Cesure_id"})})
 * @ORM\Entity
 */
class Stagecesure
{
    /**
     * @var int
     *
     * @ORM\Column(name="StageCesure_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $stagecesureId;

    /**
     * @var \Cesure
     *
     * @ORM\ManyToOne(targetEntity="Cesure")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Cesure_id", referencedColumnName="Cesure_id")
     * })
     */
    private $cesure;

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
