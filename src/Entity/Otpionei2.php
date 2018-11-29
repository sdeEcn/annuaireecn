<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Otpionei2
 *
 * @ORM\Table(name="otpionei2", indexes={@ORM\Index(name="option_otpionei2_fk", columns={"Option_id"}), @ORM\Index(name="eleves_otpionei2_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Otpionei2
{
    /**
     * @var int
     *
     * @ORM\Column(name="OptionEI2_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionei2Id;

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
