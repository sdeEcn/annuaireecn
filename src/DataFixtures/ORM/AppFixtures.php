<?php

namespace App\DataFixtures\ORM;

use App\Entity\Bureau;
use App\Entity\Club;
use App\Entity\eleve;
use App\Entity\Options;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->encoder=$passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $eleve = new eleve("eleveNom".$i,"elevePrenom".$i,"eleve".$i."@mail.fr");
            $option = new Options("Option2".$i);
            $option1 = new Options("Option3".$i);
            $eleve->setOption2($option);
            $eleve->setOption3($option1);
            $eleve->setPassword('pass');
            $eleve->setPassword($eleve->encodePassword($this->encoder));
            $manager->persist($option);
            $manager->persist($option1);
            $manager->persist($eleve);

        }
        $eleve1 = new eleve("testeleve","testPrenom".$i,"elevetest@mail.fr");
        $eleve1->setPassword('pass');
        $eleve1->setPassword($eleve1->encodePassword($this->encoder));

        $eleve = new eleve("testeleve","testPrenom".$i,"eleve@mail.fr");
        $eleve->setPassword('pass');
        $eleve->setPassword($eleve->encodePassword($this->encoder));
        $eleve->addSuiveur($eleve1);

        $bureau = new Bureau();
        $bureau->setPresident($eleve);
        $bureau->setViceprezint($eleve1);
        $bureau1 = new Bureau();
        $bureau1->setPresident($eleve1);
        $club = new Club("BDE",0);
        $club1 = new Club("NEMO",1);

        $club->setBureau($bureau);
        $club->setDescription("Le BDE est la principale association étudiante de l'école et organise les évènements de l'année");

        $club1->setBureau($bureau1);

        $club->addAdmin($eleve1);
        $club1->addAdmin($eleve1);

        $manager->persist($eleve1);
        $manager->persist($eleve);

        $manager->persist($bureau);
        $manager->persist($bureau1);
        $manager->persist($club);
        $manager->persist($club1);
        $manager->flush();
    }
}
