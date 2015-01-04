<?php
namespace HcbStoreProductDeal\Service;

use Doctrine\ORM\EntityManagerInterface;
use HcbStoreProductDeal\Entity\Deal as DealEntity;
use HcCore\Service\CommandInterface;
use HcbStoreProductDeal\Stdlib\Service\Response\CreateResponse;

class CreateService implements CommandInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var CreateResponse
     */
    protected $createResponse;

    /**
     * @param EntityManagerInterface $entityManager
     * @param CreateResponse $createResponse
     */
    public function __construct(EntityManagerInterface $entityManager,
                                CreateResponse $createResponse)
    {
        $this->entityManager = $entityManager;
        $this->createResponse = $createResponse;
    }

    /**
     * @return CreateResponse
     */
    public function execute()
    {
        try {
            $this->entityManager->beginTransaction();

            $dealEntity = new DealEntity();
            $dealEntity->setCreatedTimestamp(new \DateTime());

            $this->entityManager->persist($dealEntity);

            $this->entityManager->flush();

            $this->createResponse->setResource($dealEntity->getId());
            
            $this->entityManager->commit();
        } catch (\Exception $e) {
            $this->entityManager->rollback();
            $this->createResponse->error($e->getMessage())->failed();
            return $this->createResponse;
        }

        $this->createResponse->success();
        return $this->createResponse;
    }
}
