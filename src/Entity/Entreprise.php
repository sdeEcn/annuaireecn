<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table(name="entreprise")
 * @ORM\Entity
 */
class Entreprise
{
    /**
     * @var int
     *
     * @ORM\Column(name="Entreprise_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $entrepriseId;

    /**
     * @var string
     *
     * @ORM\Column(name="Entreprise_nom", type="string", length=100, nullable=false)
     */
    private $entrepriseNom;


}
