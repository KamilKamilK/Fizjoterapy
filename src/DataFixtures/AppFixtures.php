<?php

namespace App\DataFixtures;

use App\Entity\Fizjoterapy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $typeArray = ['fizykoterapia', 'kinezyterapia', 'masaż'];

        for ($i=0; $i <10; $i++) {
            $fizjoterapy = new Fizjoterapy();
            $fizjoterapy->setHeader('Nazwa metody : ' . rand(0, 100));
            $fizjoterapy->setText('Opis metody : ' . rand(0, 100));
            shuffle($typeArray);
            $fizjoterapy->setType($typeArray[0]);
            $fizjoterapy->setTime(new \DateTime('2021-11-08'));

            $manager->persist($fizjoterapy);
        }

        $manager->flush();
    }
}
