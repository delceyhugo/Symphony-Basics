<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Car;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $product = new Car;
        $product->setProductCode('S12_3990');
        $product->setProductName('1970 Plymouth Hemi Cuda');
        $product->setProductLine('Classic Cars');
        $product->setProductVendor('Studio M Art Models');
        $product->setProductDescription('Very detailed 1970 Plymouth Cuda model in 1:12 scale. The Cuda is generally accepted as one of the fastest original muscle cars from the 1970s. This model is a reproduction of one of the orginal 652 cars built in 1970. Red color.');
        $product->setQuantityInStock(5663);
        $product->setBuyPrice(31.92);
        $manager->persist($product);

        $product = new Car;
        $product->setProductCode('S24_4048');
        $product->setProductName('1992 Porsche Cayenne Turbo Silver');
        $product->setProductLine('Classic Cars');
        $product->setProductVendor('Exoto Designs');
        $product->setProductDescription('This replica features opening doors, superb detail and craftsmanship, working steering system, opening forward compartment, opening rear trunk with removable spare, 4 wheel independent spring suspension as well as factory baked enamel finish.');
        $product->setQuantityInStock(3109);
        $product->setBuyPrice(98.58);
        $manager->persist($product);

        $product = new Car;
        $product->setProductCode('S18_3233');
        $product->setProductName('1985 Toyota Supra');
        $product->setProductLine('Classic Cars');
        $product->setProductVendor('Highway 66 Mini Classics');
        $product->setProductDescription('This model features soft rubber tires, working steering, rubber mud guards, authentic Ford logos, detailed undercarriage, opening doors and hood, removable split rear gate, full size spare mounted in bed, detailed interior with opening glove box');
        $product->setQuantityInStock(7733);
        $product->setBuyPrice(57.01);
        $manager->persist($product);

        $product = new Car;
        $product->setProductCode('S12_3891');
        $product->setProductName('1969 Ford Falcon');
        $product->setProductLine('Classic Cars');
        $product->setProductVendor('Highway 66 Mini Classics');
        $product->setProductDescription('Turnable front wheels; steering function; detailed interior; detailed engine; opening hood; opening trunk; opening doors; and detailed chassis.');
        $product->setQuantityInStock(7844);
        $product->setBuyPrice(83.72);
        $manager->persist($product);

        $manager->flush();
    }
}
