<?php
namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;
use Faker;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('en_EN');

        for ($i = 0; $i < 150; $i++) {
            $category = $this->getReference('categoryShop-' . $faker->numberBetween(1, 6));
            $product = new Product();
            $product->setTitle($faker->sentence);
            $product->setSlug($faker->slug);
            $product->setCategory($category);
            $product->setContent($faker->text);
            $product->setSubtitle($faker->slug);
            $product->setOnline(true);
            $product->setCreatedAt(new DateTime('now'));
            $product->setImage($faker->imageUrl(640, 480, 'animals', true));
            $product->setPrice($faker->randomFloat(2));
            $manager->persist($product);
        }

        $manager->flush();
    }

}