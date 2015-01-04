<?php
namespace HcbStoreProductDeal\Service\Localized;

use Doctrine\ORM\EntityManagerInterface;
use HcbStoreProductDeal\Data\LocalizedInterface;
use HcbStoreProductDeal\Entity\Deal\Localized;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;

class UpdateService
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var Response
     */
    protected $saveResponse;

    /**
     * @param EntityManagerInterface $entityManager
     * @param Response $saveResponse
     */
    public function __construct(EntityManagerInterface $entityManager,
                                Response $saveResponse)
    {
        $this->entityManager = $entityManager;
        $this->saveResponse = $saveResponse;
    }

    /**
     * @param \HcbStoreProductDeal\Entity\Deal\Localized $dealLocalizedEntity
     * @param LocalizedInterface $localizedData
     *
     * @return Response
     */
    public function update(Localized $dealLocalizedEntity,
                           LocalizedInterface $localizedData)
    {
        try {
            $this->entityManager->beginTransaction();

            $dealEntity = $dealLocalizedEntity->getDeal();
            $products = $localizedData->getProducts();

            $dealLocalizedEntity->setTitle($localizedData->getTitle());
            $dealEntity->setStrategy($localizedData->getStrategy());
            $dealEntity->setEndDate($localizedData->getEndDate());
            $dealEntity->setStartDate($localizedData->getStartDate());
            $dealEntity->setValue($localizedData->getStrategyValue());

            $dealEntity->getProduct()->clear();

            foreach ($products as $productId) {
                $dealEntity->addProduct(
                    $this->entityManager
                         ->getReference('HcbStoreProduct\Entity\Product', $productId));
            }

            $this->entityManager->persist($dealLocalizedEntity);
            $this->entityManager->flush();
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->saveResponse->error($e->getMessage())->failed();
            return $this->saveResponse;
        }

        $this->saveResponse->success();
        return $this->saveResponse;
    }
}
