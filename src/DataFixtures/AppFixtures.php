<?php

namespace App\DataFixtures;

use App\Entity\ProviderList;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $provider_list=[['source1', 'http://www.mocky.io/v2/5a74519d2d0000430bfe0fa0'],['source2','http://www.mocky.io/v2/5a74524e2d0000430bfe0fa3']];
        foreach ($provider_list as $provider_info)
        {
            $provider= new ProviderList();
            $provider->setProviderName($provider_info[0]);
            $provider->setProviderAddress($provider_info[1]);
            $manager->persist($provider);
        }

        $manager->flush();

    }
}
