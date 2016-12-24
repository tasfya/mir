<?php
namespace MirMigration\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class SoundRepository
 * @package MirMigration\Repository
 */
class SoundCategoryRepository extends EntityRepository{

    public function getMountounes(){
        return $this->createQueryBuilder('c')
            ->join('c.category', 'p')
            ->join('p.category', 'm')
            ->where('m.id = :id')
            ->setParameter('id', 3)
            ->getQuery()
            ->getResult();
    }

}