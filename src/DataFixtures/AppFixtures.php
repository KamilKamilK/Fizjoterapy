<?php

namespace App\DataFixtures;

use App\Entity\Fizjoterapy;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    /**
     * @param UserPasswordHasherInterface
     */

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadMethods($manager);
        $this->loadUsers($manager);
    }

    public function loadMethods(ObjectManager $manager): void
    {
        $typeArray = ['fizykoterapia', 'kinezyterapia', 'masaż'];

        for ($i = 0; $i < 10; $i++) {
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

    public function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('kamil_kkk');
        $user->setFullname('Kamil KKK');
        $user->setEmail('kamil@gmial.com');
        $user->setPassword(
            $this->passwordHasher->hashPassword(
                $user, 'kamil123'));

        $manager->persist($user);
        $manager->flush();
    }
}
