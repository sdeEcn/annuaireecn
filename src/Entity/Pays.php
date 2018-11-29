<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity
 */
class Pays
{
    /**
     * @var int
     *
     * @ORM\Column(name="Pays_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $paysId;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays_nom", type="string", length=100, nullable=false)
     */
    private $paysNom;


}
