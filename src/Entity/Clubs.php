<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Clubs
 *
 * @ORM\Table(name="clubs")
 * @ORM\Entity
 */
class Clubs
{
    /**
     * @var int
     *
     * @ORM\Column(name="Club_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $clubId;

    /**
     * @var string
     *
     * @ORM\Column(name="Club_nom", type="string", length=100, nullable=false)
     */
    private $clubNom;

    /**
     * @var int
     *
     * @ORM\Column(name="Club_Confidentialite", type="integer", nullable=false)
     */
    private $clubConfidentialite;


}
