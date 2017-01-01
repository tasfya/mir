<?php

namespace MirMigration\Repository;


use Doctrine\ORM\EntityRepository;

class BookDischargeRepository extends EntityRepository
{
    public function findByDates( \DateTime $begin = null, \DateTime $end = null ){
        $q = $this->createQueryBuilder('b')
            ->where('1=1');

        if( $begin !== null ){
            $q->andWhere('b.date >= :begin')
                ->setParameter('begin', $begin);
        }

        if( $end !== null ){
            $q->andWhere('b.date <= :end')
                ->setParameter('end', $end);
        }

        return $q->getQuery()->getResult();
    }
}