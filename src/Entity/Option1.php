<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Option1
 *
 * @ORM\Table(name="option_1")
 * @ORM\Entity
 */
class Option1
{
    /**
     * @var int
     *
     * @ORM\Column(name="Option_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $optionId;

    /**
     * @var string
     *
     * @ORM\Column(name="Option_nom", type="string", length=100, nullable=false)
     */
    private $optionNom;


}
