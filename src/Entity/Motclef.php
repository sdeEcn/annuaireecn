<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Motclef
 *
 * @ORM\Table(name="motclef")
 * @ORM\Entity
 */
class Motclef
{
    /**
     * @var int
     *
     * @ORM\Column(name="Motclef_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $motclefId;

    /**
     * @var string
     *
     * @ORM\Column(name="Motclef_mot", type="string", length=100, nullable=false)
     */
    private $motclefMot;


}
