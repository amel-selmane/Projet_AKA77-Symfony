<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Artists;
use App\Entity\BlogArticle;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');


        for($i = 1; $i <= 15; $i++){

            $blogArticle = new blogArticle();
            $blogArticle->setTitleArticle($faker->sentence)
                        ->setUrlArticle($faker->url)
                        ->setContentArticle($faker->text(700))
                        ->setLikeArticle($faker->numberBetween(1, 100))
                        //->setIdArtist($faker->randomDigitNotNull)
                    // ->setImage($faker->imageUrl)
                    // ->setCreatedAt(new \DateTime());
                        ->setDateModification($faker->dateTimeAD('now', 'Europe/Paris'));
            $manager->persist($blogArticle);
        }
        $manager->flush();
    }
}
