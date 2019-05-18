<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin');
        $admin->setEmail('admin@admin.fr');
        $admin->setPassword($this->encoder->encodePassword($admin,'basepass'));
        $admin->addRoles(['ROLE_USER', 'ROLE_ADMIN']);
        $manager->persist($admin);

        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@user.fr');
        $user->setPassword($this->encoder->encodePassword($user,'basepass'));
        $user->addRoles(['ROLE_USER']);
        $manager->persist($user);

        $manager->flush();
    }
}
