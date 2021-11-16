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
        $departement->setEmail("direction@example.com");

        $departement1 = new Departement();
        $departement1->setNom("Ressources Humaines");
        $departement1->setEmail("rh@example.com");

        $departement2 = new Departement();
        $departement2->setNom("Communication");
        $departement2->setEmail("communication@example.com");

        $departement3 = new Departement();
        $departement3->setNom("Developpement");
        $departement3->setEmail("Developpement@example.com");

        $manager->persist($departement);
        $manager->persist($departement1);
        $manager->persist($departement2);
        $manager->persist($departement3);

        $manager->flush();
    }
}
