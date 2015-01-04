<?php
namespace HcbStoreProductDeal\Stdlib\Extractor;

use Doctrine\ORM\EntityManager;
use Zf2Libs\Stdlib\Extractor\ExtractorInterface;
use Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException;

use HcbStoreProductDeal\Entity\Deal as DealEntity;

class Resource implements ExtractorInterface
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Extract values from an object
     *
     * @param  DealEntity $dealEntity
     *
*@throws \Zf2Libs\Stdlib\Extractor\Exception\InvalidArgumentException
     * @return array
     */
    public function extract( $dealEntity)
    {
        if ( ! $dealEntity instanceof DealEntity) {
            throw new InvalidArgumentException("Expected HcbStoreProductDeal\\Entity\\Deal object, invalid object given");
        }

        $startTimestamp = $dealEntity->getStartDate();
        if (is_null($startTimestamp)) {
            $startTimestamp = '';
        } else {
            $startTimestamp = $startTimestamp->format('Y-m-d H:i:s');
        }

        $endTimestamp = $dealEntity->getEndDate();
        if (is_null($endTimestamp)) {
            $endTimestamp = '';
        } else {
            $endTimestamp = $endTimestamp->format('Y-m-d H:i:s');
        }

        $active = 0;
        if ($dealEntity->getStartDate() < new \DateTime() &&
            (empty($endTimestamp) ||
             $dealEntity->getEndDate() > new \DateTime())) {
            $active = 1;
        }

        $localized = $dealEntity->getLocalized();
        $title = '__EMPTY__';
        if ($localized->count() > 0) {
            $title = $localized->current()->getTitle();
        }

        return array('id'=> $dealEntity->getId(),
                     'title'=>$title,
                     'startDate'=>$startTimestamp,
                     'endDate'=>$endTimestamp,
                     'active'=>$active);
    }
}
