<?php

namespace App\DataFixtures\ORM;

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
        $manager->persist($eleve1);
        $manager->persist($eleve);

        $manager->flush();
    }
}
