<?php
namespace App\DataFixtures;
use App\Entity\CategoryShop;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
    class CategoryShopFixtures extends Fixture
    {
        public function load(ObjectManager $manager)
        {

            $categories = [
                1 => [
                    'name' => 'Foods',
                    'slug' => 'All foods'
                ],
                2 => [
                    'name' => 'Drinks',
                    'slug' => 'All drinks'
                ],
                3 => [
                    'name' => 'Babies and kids',
                    'slug' => 'Baby foods and accessories'
                ],
                4 => [
                    'name' => 'Fruits and Vegetables',
                    'slug' => 'Fresh and dried'
                ],
                5 => [
                    'name' => 'Pets',
                    'slug' => 'Foods and accessories'
                ],
                6 => [
                    'name' => 'Accessories',
                    'slug' => 'All accessories'
                ],
                7 => [
                    'name' => 'Home and garden',
                    'slug' => 'Outdoor and lights'
                ]
            ];

            foreach ($categories as $k => $value) {
                $categoryShop = new CategoryShop();

                $categoryShop->setName($value['name']);
                $categoryShop->setSlug($value['slug']);

                $manager->persist($categoryShop);

                $this->addReference('categoryShop-' . $k, $categoryShop);
            }

            $manager->flush();
        }
    }