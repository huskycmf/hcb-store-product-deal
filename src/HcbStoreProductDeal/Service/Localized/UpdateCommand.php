<?php
namespace HcbStoreProductDeal\Service\Localized;

use HcCore\Entity\EntityInterface;
use HcCore\Service\ResourceCommandInterface;
use HcbStoreProductDeal\Data\LocalizedInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\ResponseInterface;

class UpdateCommand implements ResourceCommandInterface
{
    /**
     * @var LocalizedInterface
     */
    protected $localizedData;

    /**
     * @var UpdateService
     */
    protected $service;

    public function __construct(LocalizedInterface $localizedData,
                                UpdateService $service)
    {
        $this->localizedData = $localizedData;
        $this->service = $service;
    }

    /**
     * @param \HcCore\Entity\EntityInterface|\HcbStoreProductDeal\Entity\Deal\Localized $dealLocalizedEntity
     *
     * @return ResponseInterface
     */
    public function execute(EntityInterface $dealLocalizedEntity)
    {
        return $this->service->update($dealLocalizedEntity, $this->localizedData);
    }
}
