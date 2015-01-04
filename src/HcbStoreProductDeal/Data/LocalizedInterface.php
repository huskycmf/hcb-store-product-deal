<?php
namespace HcbStoreProductDeal\Data;

use HcCore\Data\LocaleInterface;

interface LocalizedInterface extends LocaleInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return number
     */
    public function getStrategyValue();

    /**
     * @return string
     */
    public function getStrategy();

    /**
     * @return \DateTime
     */
    public function getStartDate();

    /**
     * @return \DateTime | null
     */
    public function getEndDate();

    /**
     * @return array
     */
    public function getProducts();
}
