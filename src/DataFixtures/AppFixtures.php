<?php

namespace App\DataFixtures;

use App\Entity\Chanson;
use App\Entity\Chanteur;
use App\Entity\Disque;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    private $faker;
    public function __construct(){
        $this->faker = Factory::create("fr_FR");
    }
    public function load(ObjectManager $manager): void
    {
       $listChanteur = [];
       $listDisque = [];

       for( $i = 0; $i < 10; $i++ ){
            $chanteur = new Chanteur();
            $chanteur->setName($this->faker->name());
            $manager ->persist($chanteur);

            $listChanteur[] = $chanteur;
       }


       for( $i = 0; $i < 20; $i++){
            $disque = new Disque();
            $disque->setNameDisque($this->faker->sentence());
            $disque->setChanteur($listChanteur[array_rand($listChanteur)]);
        
            $manager->persist($disque);
            $listDisque[] = $disque;
       }

       for( $i = 0; $i < 20; $i++){
        $chanson = new Chanson();
        $chanson->setName($this->faker->sentence());
        $chanson->setDuree($this->faker->dateTime());
        $chanson->setChanson($listDisque[array_rand($listDisque)]);
    
        $manager->persist($chanson);
    }

        $manager->flush();
    }
}