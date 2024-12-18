<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formateur;
class FormateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
   {
        for ($i = 0; $i < 10; $i++){
            $formateur = new Formateur();
            $formateur->setId($i);
            $formateur->setNom("Formateur n°$i");
            $formateur->setPrenom("Prenom n°$i");
            $manager->persist($formateur);
        } 
        $manager->flush();
    }
}
