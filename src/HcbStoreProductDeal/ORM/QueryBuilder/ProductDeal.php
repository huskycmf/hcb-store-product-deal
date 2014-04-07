<?php
namespace HcbStoreProductDeal\ORM\QueryBuilder;

use Doctrine\ORM\QueryBuilder;
use HcbStoreProduct\Entity\Product as ProductEntity;
use Doctrine\ORM\EntityManagerInterface;

class ProductDeal
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param ProductEntity $productEntity
     * @param string $alias
     * @return QueryBuilder
     */
    public function get(ProductEntity $productEntity, $alias = 'd')
    {
        /* @var $repository \Doctrine\ORM\EntityRepository */
        $repository = $this->entityManager->getRepository('HcbStoreProductDeal\Entity\Deal');

        $qb = $repository->createQueryBuilder($alias);

        $qb->join($alias.'.product', 'p');
        $qb->where('p = :product')
           ->setParameter('product', $productEntity);

        return $qb;
    }
}
