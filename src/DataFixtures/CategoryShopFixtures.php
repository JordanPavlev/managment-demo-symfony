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
                    'slug' => 'foods'
                ],
                2 => [
                    'name' => 'Drinks',
                    'slug' => 'drinks'
                ],
                3 => [
                    'name' => 'Babies and kids',
                    'slug' => 'kids'
                ],
                4 => [
                    'name' => 'Fruits and Vegetables',
                    'slug' => 'freshfoods'
                ],
                5 => [
                    'name' => 'Pets',
                    'slug' => 'pets'
                ],
                6 => [
                    'name' => 'Accessories',
                    'slug' => 'accessories'
                ],
                7 => [
                    'name' => 'Home and garden',
                    'slug' => 'outdoor'
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
