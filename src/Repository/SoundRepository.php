<?php
namespace MirMigration\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class SoundRepository
 * @package MirMigration\Repository
 */
class SoundRepository extends EntityRepository{

    public function findByDates( \DateTime $begin = null, \DateTime $end = null ){
        $q = $this->createQueryBuilder('s')
            ->where('1=1');

        if( $begin !== null ){
            $q->andWhere('s.date >= :begin')
                ->setParameter('begin', $begin);
        }

        if( $end !== null ){
            $q->andWhere('s.date <= :end')
                ->setParameter('end', $end);
        }

        return $q->getQuery()->getResult();
    }

    public function getExplanationsByMatne($id){
        return $this->createQueryBuilder('e')
            ->leftJoin('e.category', 'c')
            ->where( 'e.place = :id or c.place = :id' )
            ->setParameter('id' , $id)
            ->getQuery()->getResult();
    }

}