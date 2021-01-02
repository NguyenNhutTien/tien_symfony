<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');

        $user =  $this->getReference(UserFixtures::USER_REFERENCE);
      //  dd($user);  // I want to check value of $user, but it null ?

        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->setTitle($faker->title());
            $post->setSlug($faker->slug());
            $post->setContent($faker->paragraph());
            $post->setPublishAt($faker->dateTimeBetween('-100 days', '-1 days'));
            $post->setAuthor($user);
            $manager->persist($post);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }

}
