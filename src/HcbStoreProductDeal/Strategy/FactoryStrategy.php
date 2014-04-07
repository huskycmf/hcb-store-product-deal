<?php
namespace HcbStoreProductDeal\Strategy;

use HcbStoreProductDeal\Entity\Deal as DealEntity;
use HcbStoreProductDeal\Strategy\Exception\InvalidStrategyException;
use Zend\Di\Di;

class FactoryStrategy
{
    /**
     * @var \Zend\Di\Di
     */
    protected $di;

    /**
     * @param Di $di
     */
    public function __construct(Di $di)
    {
        $this->di = $di;
    }

    /**
     * @param DealEntity $dealEntity
     * @return StrategyInterface
     * @throws InvalidStrategyException
     */
    public function createStrategy(DealEntity $dealEntity)
    {
        if ($dealEntity->getStrategy() == DealEntity::STRATEGY_PERCENT) {
            return $this->di->newInstance('HcbStoreProductDeal\Strategy\PercentStrategy',
                                          array('dealEntity'=>$dealEntity));
        } else if ($dealEntity->getStrategy() == DealEntity::STRATEGY_STATIC) {
            return $this->di->newInstance('HcbStoreProductDeal\Strategy\StaticStrategy',
                                          array('dealEntity'=>$dealEntity));
        } else {
            throw new InvalidStrategyException("Invalid strategy ".$dealEntity->getStrategy());
        }
    }
}
