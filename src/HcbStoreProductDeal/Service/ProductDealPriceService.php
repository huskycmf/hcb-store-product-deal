<?php
namespace HcbStoreProductDeal\Service;

use HcbStoreProduct\Entity\Product as ProductEntity;
use HcbStoreProductDeal\ORM\QueryBuilder\ProductDeal;
use HcbStoreProductDeal\Strategy\FactoryStrategy;

class ProductDealPriceService
{
    /**
     * @var ProductDeal
     */
    protected $productDeal;

    /**
     * @var FactoryStrategy
     */
    protected $dealStrategyFactory;

    public function __construct(ProductDeal $productDeal,
                                FactoryStrategy $dealStrategyFactory)
    {
        $this->productDeal = $productDeal;
        $this->dealStrategyFactory = $dealStrategyFactory;
    }

    /**
     * @param ProductEntity $productEntity
     * @return float
     */
    public function get(ProductEntity $productEntity)
    {
        $dealQb = $this->productDeal->get($productEntity);

        /* @var $dealEntity \HcbStoreProductDeal\Entity\Deal */
        $dealEntity = $dealQb->setMaxResults(1)->getQuery()
                             ->getOneOrNullResult();

        $dealPrice = $productEntity->getPriceDeal();

        if (is_null($dealEntity)) {
            if ($dealPrice) {
                return $dealPrice;
            }
            return $productEntity->getPrice();
        }

        $strategy = $this->dealStrategyFactory->createStrategy($dealEntity);
        $dealPrice = $strategy->getPrice($productEntity->getPrice());

        return $dealPrice;
    }
}
