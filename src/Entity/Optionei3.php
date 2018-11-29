<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Optionei3
 *
 * @ORM\Table(name="optionei3", indexes={@ORM\Index(name="option_optionei3_fk", columns={"Option_id"}), @ORM\Index(name="eleves_optionei3_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Optionei3
{
    /**
     * @var int
     *
     * @ORM\Column(name="OptionEI3_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionei3Id;

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
     * @var \Option1
     *
     * @ORM\ManyToOne(targetEntity="Option1")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Option_id", referencedColumnName="Option_id")
     * })
     */
    private $option;


}
