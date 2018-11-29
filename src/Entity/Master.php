<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Master
 *
 * @ORM\Table(name="master", indexes={@ORM\Index(name="universites_master_fk", columns={"Universite_id"})})
 * @ORM\Entity
 */
class Master
{
    /**
     * @var int
     *
     * @ORM\Column(name="Master_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $masterId;

    /**
     * @var string
     *
     * @ORM\Column(name="Master_Nom", type="string", length=100, nullable=false)
     */
    private $masterNom;

    /**
     * @var \Universites
     *
     * @ORM\ManyToOne(targetEntity="Universites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Universite_id", referencedColumnName="Universite_id")
     * })
     */
    private $universite;


}
