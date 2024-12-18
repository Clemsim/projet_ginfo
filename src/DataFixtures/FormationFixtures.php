<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formation;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++){
            $formation = new Formation();
            $formation->setId($i);
            $formation->setNom("Formation n°$i");
            $formation->setDate(new \DateTime());
            $manager->persist($formation);
}
        $manager->flush();
    }
}
