<?php
namespace HcbStoreProductDeal\Service\Localized;

use HcCore\Entity\EntityInterface;
use HcCore\Service\ResourceCommandInterface;
use HcbStoreProductDeal\Data\LocalizedInterface;
use HcbStoreProductDeal\Entity\Deal as DealEntity;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class CreateCommand implements ResourceCommandInterface
{
    /**
     * @var LocalizedInterface
     */
    protected $localizedData;

    /**
     * @var CreateService
     */
    protected $service;

    /**
     * @param LocalizedInterface $localizedData
     * @param CreateService $service
     */
    public function __construct(LocalizedInterface $localizedData,
                                CreateService $service)
    {
        $this->localizedData = $localizedData;
        $this->service = $service;
    }

    /**
     * @param DealEntity $dealEntity
     *
     * @return Response
     */
    public function execute(EntityInterface $dealEntity)
    {
        return $this->service->save($dealEntity, $this->localizedData);
    }
}
