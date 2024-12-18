<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Formations;
class FormationsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $formation = new Formations();
        $manager->persist($formation);
        $manager->flush();
    }
}
