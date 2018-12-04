<?php

namespace App\DataFixtures\ORM;

use App\Entity\eleve;
use App\Entity\Options;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i=0;$i<10;$i++){
            $eleve = new eleve("eleveNom".$i,"elevePrenom".$i,"eleve".$i."@mail.fr");
            $option = new Options("Option2".$i);
            $option1 = new Options("Option3".$i);
            $eleve->setOption2($option);
            $eleve->setOption3($option1);
            $manager->persist($option);
            $manager->persist($option1);
            $manager->persist($eleve);

        }

        $manager->flush();
    }
}
