<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Travail
 *
 * @ORM\Table(name="travail", indexes={@ORM\Index(name="entreprise_travail_fk", columns={"Entreprise_id"}), @ORM\Index(name="eleves_travail_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Travail
{
    /**
     * @var int
     *
     * @ORM\Column(name="Travail_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $travailId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Travail_poste", type="string", length=100, nullable=true)
     */
    private $travailPoste;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Travail_anneeDebut", type="date", nullable=false)
     */
    private $travailAnneedebut;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="Travail_anneeFin", type="date", nullable=true)
     */
    private $travailAnneefin;

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
