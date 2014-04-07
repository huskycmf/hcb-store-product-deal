<?php
namespace HcbStoreProductDeal\Service\Product\Collection;

use HcBackend\Service\Fetch\Paginator\QueryBuilder\ResourceDataServiceInterface;
use HcCore\Service\Filtration\Query\FiltrationServiceInterface;
use HcCore\Service\Sorting\SortingServiceInterface;
use Doctrine\ORM\EntityManagerInterface;

class FetchQbBuilderService implements ResourceDataServiceInterface
{
    /**
     * @var SortingServiceInterface
     */
    protected $sortingService;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var FiltrationServiceInterface
     */
    protected $filtrationService;

    /**
     * @param EntityManagerInterface $entityManager
     * @param SortingServiceInterface $sortingService
     * @param FiltrationServiceInterface $filtrationService
     */
    public function __construct(EntityManagerInterface $entityManager,
                                SortingServiceInterface $sortingService,
                                FiltrationServiceInterface $filtrationService)
    {
        $this->entityManager = $entityManager;
        $this->sortingService = $sortingService;
        $this->filtrationService = $filtrationService;
    }

    /**
     * @param ProductEntity $productEntity
     * @return float
     */
    public function fetch()
    {
        $dealQb = $this->productDeal->get($productEntity);

        /* @var $dealEntity \HcbStoreProductDeal\Entity\Deal */
        $dealEntity = $dealQb->setMaxResults(1)->getQuery()
                             ->getOneOrNullResult();

        $dealPrice = $productEntity->getPriceDeal();

        if (is_null($dealEntity)) {
            if ($dealPrice) {
                return $dealPrice;
            }
            return $productEntity->getPrice();
        }

        $strategy = $this->dealStrategyFactory->createStrategy($dealEntity);
        $dealPrice = $strategy->getPrice($productEntity->getPrice());

        return $dealPrice;
    }
}
