<?php
namespace HcbStoreProductDeal\Stdlib\Extractor\Localized;

use Doctrine\ORM\EntityManagerInterface;
use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;
use HcbStoreProductDeal\Entity\Deal\Localized as DealLocalizedEntity;

class Resource implements ExtractorInterface
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
     * Extract values from an object
     *
     * @param  DealLocalizedEntity $dealLocalized
     * @throws InvalidArgumentException
     * @return array
     */
    public function extract($dealLocalized)
    {
        if (!$dealLocalized instanceof DealLocalizedEntity) {
            throw new InvalidArgumentException
     ("Expected HcbStoreProductDeal\\Entity\\Deal\\Localized object, invalid object given");
        }

        $dealEntity = $dealLocalized->getDeal();

        $startTimestamp = $dealEntity->getStartDate();
        if (is_null($startTimestamp)) {
            $startTimestamp = '';
        } else {
            $startTimestamp = $startTimestamp->format('Y-m-d');
        }

        $endTimestamp = $dealEntity->getEndDate();
        if (is_null($endTimestamp)) {
            $endTimestamp = '';
        } else {
            $endTimestamp = $endTimestamp->format('Y-m-d');
        }

        $localeEntity = $dealLocalized->getLocale();

        $products = $dealEntity->getProduct();

        $localData = array('locale'=>($localeEntity ? $localeEntity->getLocale() : ''),
                           'title'=> $dealLocalized->getTitle(),
                           'startDate'=>$startTimestamp,
                           'products[]'=>$products->map(function ($product){
                               return (string)$product->getId();
                           })->toArray(),
                           'strategy'=>$dealEntity->getStrategy(),
                           'value'=>$dealEntity->getValue());

        if ($dealLocalized->getId()) {
            $localData['id'] = $dealLocalized->getId();
        }

        if (!empty($endTimestamp)) {
            $localData['endDate'] = $endTimestamp;
        }

        return $localData;
    }
}
