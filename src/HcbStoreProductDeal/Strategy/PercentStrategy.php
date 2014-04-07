<?php
namespace HcbStoreProductDeal\Strategy;

use HcbStoreProductDeal\Entity\Deal as DealEntity;
use HcbStoreProductDeal\Exception\InvalidArgumentException;

class PercentStrategy implements StrategyInterface
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

        $percentValue = $this->dealEntity->getValue();
        if ($percentValue <= 0) {
            throw new InvalidArgumentException("Percent value could not be less or equal then 0");
        }

        return $price - ($price * ($percentValue / 100));
    }
}
