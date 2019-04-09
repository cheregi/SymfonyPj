<?php

namespace App\DataFixtures;

use App\Entity\Picture;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $user = new User();
        $user->setEmail('test@test.com')
            ->setActive(true)
            ->setPassword('123456aA!')
            ->setTermAccepted(true)
            ->setUsername('zxcva');

        $manager->persist($user);

        for($iteration = 0;$iteration<200;$iteration++){
            $picture = new Picture();
            $picture ->setMimeType('image/jpeg')
//                ->setMimeType('image/png')
                ->setSharer($user)
                ->setDescription('Description number'.$iteration)
                ->setTitle('Picture number'.$iteration)
                ->setPath($iteration.'.none');
//                ->setPath($iteration.'.moe');

            $manager->persist($picture);
        }

        $manager->flush();
    }
}
