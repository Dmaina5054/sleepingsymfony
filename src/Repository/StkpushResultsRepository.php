<?php

namespace App\Repository;

use App\Entity\StkpushResults;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StkpushResults>
 *
 * @method StkpushResults|null find($id, $lockMode = null, $lockVersion = null)
 * @method StkpushResults|null findOneBy(array $criteria, array $orderBy = null)
 * @method StkpushResults[]    findAll()
 * @method StkpushResults[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StkpushResultsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StkpushResults::class);
    }

    public function add(StkpushResults $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(StkpushResults $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function saveStkpushResult($merchantRequestId, $checkoutRequestId, $responseCode, $responseDescription, $customerMessage)
    {
        $newStkResults = new StkpushResults();
        $newStkResults->setMerchantRequestID($merchantRequestId)
            ->setCheckoutRequestID($checkoutRequestId)
            ->setResponseCode($responseCode)
            ->setResponseDescription($responseDescription)
            ->setCustomerMessage($customerMessage);
        $this->getEntityManager()->persist($newStkResults);
        $this->getEntityManager()->flush();
    }

    /**
     * @return StkpushResults[] Returns an array of StkpushResults objects
     */
    public function findByCheckoutRequestId($value): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.CheckoutRequestID = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findAll(): array
    {
        return $this->createQueryBuilder('s')
            ->orderBy('s.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?StkpushResults
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
