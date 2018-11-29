<?php

namespace 'App\Entity';

use Doctrine\ORM\Mapping as ORM;

/**
 * Eleves
 *
 * @ORM\Table(name="eleves")
 * @ORM\Entity
 */
class Eleves
{
    /**
     * @var int
     *
     * @ORM\Column(name="Eleve_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eleveId;

    /**
     * @var string
     *
     * @ORM\Column(name="Eleve_nom", type="string", length=255, nullable=false)
     */
    private $eleveNom;

    /**
     * @var string
     *
     * @ORM\Column(name="Eleve_prenom", type="string", length=255, nullable=false)
     */
    private $elevePrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="Eleve_mail", type="string", length=100, nullable=false)
     */
    private $eleveMail;

    /**
     * @var int
     *
     * @ORM\Column(name="Eleve_annee", type="integer", nullable=false, options={"default"="1"})
     */
    private $eleveAnnee = '1';


}
