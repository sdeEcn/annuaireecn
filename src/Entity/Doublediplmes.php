<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Doublediplmes
 *
 * @ORM\Table(name="doublediplmes", indexes={@ORM\Index(name="master_doublediplômes_fk", columns={"Master_id"}), @ORM\Index(name="eleves_doublediplômes_fk", columns={"Eleve_id"})})
 * @ORM\Entity
 */
class Doublediplmes
{
    /**
     * @var int
     *
     * @ORM\Column(name="DD_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ddId;

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
     * @var \Master
     *
     * @ORM\ManyToOne(targetEntity="Master")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Master_id", referencedColumnName="Master_id")
     * })
     */
    private $master;


}
