<?php
namespace MirMigration\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class SoundRepository
 * @package MirMigration\Repository
 */
class SoundRepository extends EntityRepository{

    /**
     * @param \DateTime|null $begin
     * @param \DateTime|null $end
     * @param int|null $category
     * @return array
     */
    public function findByDates( \DateTime $begin = null, \DateTime $end = null, $category = null ){
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

        if( $category !== null ){
            $q->leftJoin('s.category', 'c')
                ->andWhere('c.place = :category or s.place = :category')
                ->setParameter('category', $category);
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

    public function getExplanations($moutounes, $begin = null, $end = null){
        $q =  $this->createQueryBuilder('e')
            ->leftJoin('e.category', 'c')
            ->where( 'e.category in (:moutounes) or c.category in (:moutounes)' )
            ->setParameter('moutounes' , $moutounes);

        if( $begin !== null ){
            $begin = new \DateTime($begin);
            $q->andWhere('e.date >= :begin')
                ->setParameter('begin', $begin);
        }

        if( $end !== null ){
            $end = new \DateTime($end);
            $q->andWhere('e.date <= :end')
                ->setParameter('end', $end);
        }

        return $q
            ->orderBy('e.reader', 'asc')
            ->addOrderBy('e.place', 'asc')
            ->addOrderBy('e.id', 'asc')
            ->getQuery()
            ->getResult();
    }

}