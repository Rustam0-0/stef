<?php

namespace App\Repository;

use App\Entity\Tire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Tire>
 *
 * @method Tire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tire[]    findAll()
 * @method Tire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tire::class);
    }

    public function add(Tire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Tire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findBySearch($value)
    {
        return $this->createQueryBuilder('t')
            ->join("t.width", "w")
            ->join("t.height", "h")
            ->join("t.diameter", "d")
            ->join("t.season", "s")
            ->join("t.new_used", "n")
            ->andWhere('t.mark Like :value')
            ->orWhere('t.description Like :value')
            ->orWhere('w.name Like :value')
            ->orWhere('h.name Like :value')
            ->orWhere('d.name Like :value')
            ->orWhere('s.name Like :value')
            ->orWhere('n.name Like :value')
            ->setParameter('value', '%'.$value.'%')
            ->orderBy('t.id', 'ASC')
            ->getQuery()
            ->getResult()
            ;
    }

//    /**
//     * @return Tire[] Returns an array of Tire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Tire
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
