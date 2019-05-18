<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setEmail('admin@admin.fr');
        $admin->setPassword('basepass');
        $admin->addRoles(['USER', 'ADMIN']);
        $manager->persist($admin);

        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@user.fr');
        $user->setPassword('basepass');
        $user->addRoles(['USER']);
        $manager->persist($user);

        $manager->flush();
    }
}
