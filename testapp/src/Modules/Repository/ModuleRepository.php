<?php

namespace App\Modules\Repository;

use App\Modules\Entity\Module;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Modules>
 *
 * @method Modules|null find($id, $lockMode = null, $lockVersion = null)
 * @method Modules|null findOneBy(array $criteria, array $orderBy = null)
 * @method Modules[]    findAll()
 * @method Modules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Module::class);
    }
}
