<?php
namespace MirMigration\Repository;


use Doctrine\ORM\EntityRepository;

/**
 * Class SoundRepository
 * @package MirMigration\Repository
 */
class QuestionRepository extends EntityRepository{

    public function findByDates( \DateTime $begin = null, \DateTime $end = null ){
        $q = $this->createQueryBuilder('q')
            ->where('1 = :answered')
            ->setParameter('answered', 1);

        if( $begin !== null ){
            $q->andWhere('q.createdDate >= :begin')
                ->setParameter('begin', $begin);
        }

        if( $end !== null ){
            $q->andWhere('q.createdDate <= :end')
                ->setParameter('end', $end);
        }

        return $q->getQuery()->getResult();
    }

}