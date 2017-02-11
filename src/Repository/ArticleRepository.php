<?php

namespace MirMigration\Repository;


use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function findByDates( \DateTime $begin = null, \DateTime $end = null ){
        $q = $this->createQueryBuilder('a')
            ->where('a.text != :text AND a.text IS NOT NULL')
            ->setParameter('text', '');

        if( $begin !== null ){
            $q->andWhere('a.date >= :begin')
                ->setParameter('begin', $begin);
        }

        if( $end !== null ){
            $q->andWhere('a.date <= :end')
                ->setParameter('end', $end);
        }

        return $q->orderBy('a.category', 'asc')
            ->addOrderBy('a.reader', 'asc')
            ->getQuery()->getResult();
    }
}