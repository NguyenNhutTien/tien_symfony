<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public const USER_REFERENCE = 'users';
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setEmail('tien.nguyen@nfq.asia');
        $user1->setPassword(
            $this->passwordEncoder->encodePassword(
                $user1,
                '123456'
            )
        );
        $user1->setRoles(['ROLE_ADMIN']);
        $manager->persist($user1);
        $manager->flush();
        dump($user1); // it still has value
        $this->addReference(self::USER_REFERENCE, $user1);
    }
}
