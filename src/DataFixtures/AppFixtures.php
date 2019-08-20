<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use App\Repository\ArtisteRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Artiste;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        // $product = new Product();
        // $manager->persist($product);
        $a = $manager->getRepository(Artiste::class)->find(1);
        dump($a->getName());
        die;

        for ($i = 0; $i < 10; $i++) {
            $rand = rand(0, count($a));
            $evenement = new Evenement();
            $evenement->setType($faker->sentence($nbWords = 3, $variableNbWords = true))
                ->setDateDebut($faker->dateTime($max = 'now', $timezone = null))
                ->setDatefin($faker->dateTime($max = 'now', $timezone = null))
                ->setDescription($faker->sentence($nbWords = 20, $variableNbWords = true))
                ->setLieu($faker->country)
                ->setVille($faker->countryCode)
                ->setPrix($faker->numberBetween($min = 30, $max = 100))
                ->setArtisteId($a[$rand]);
            $manager->persist($evenement);
        }


        $manager->flush();
    }
}
