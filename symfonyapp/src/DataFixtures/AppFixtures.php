<?php

namespace App\DataFixtures;
use App\Entity\Departement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $departement = new Departement();
        $departement->setNom("Direction");
        $departement->setEmail("amevigbe41@gmail.com");

        $departement1 = new Departement();
        $departement1->setNom("Ressources Humaines");
        $departement1->setEmail("amevigbe41@gmail.com");
        $manager->persist($departement);
        $manager->persist($departement1);

        $manager->flush();
    }
}
