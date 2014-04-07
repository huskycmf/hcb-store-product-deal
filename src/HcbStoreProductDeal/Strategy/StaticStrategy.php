<?php
namespace HcbStoreProductDeal\Strategy;

use HcbStoreProductDeal\Entity\Deal as DealEntity;

class StaticStrategy implements StrategyInterface
{
    /**
     * @var DealEntity
     */
    protected $dealEntity;

    /**
     * @param DealEntity $dealEntity
     */
    public function __construct(DealEntity $dealEntity)
    {
        $this->dealEntity = $dealEntity;
    }

    /**
     * @param string $price
     * @return mixed
     */
    public function getPrice($price)
    {
        if ($price < 1) return $price;

        $staticValue = $this->dealEntity->getValue();

        if ($staticValue > $price) {
            return 0;
        }

        return $price - $staticValue;
    }
}
