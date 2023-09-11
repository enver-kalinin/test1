<?php

namespace App\Modules\DataFixtures;

use App\Modules\Entity\Module;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ModuleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $modules_data = [
            [
                'subdomain' => 'domain1',
                'module_name' => 'Module1'
            ],
            [
                'subdomain' => 'domain2',
                'module_name' => 'Module2'
            ],
        ];

        foreach ($modules_data as $module_data) {
            $module = new Module();
            $module
                ->setSubdomain($module_data['subdomain'])
                ->setName($module_data['module_name']);

            $manager->persist($module);
        }

        $manager->flush();
    }
}
