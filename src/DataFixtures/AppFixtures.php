<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\UserDoctrine;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i=0; $i < 50; $i++) {            
            $user = new UserDoctrine();
            $user
                ->setName($faker->lastName)
                ->setEmail($faker->safeEmail)
                ->setDate($faker->dateTimeBetween)
            ;
            $manager->persist($user);
        }
    
        $manager->flush();
    }
}
