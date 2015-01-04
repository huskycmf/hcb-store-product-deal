<?php
namespace HcbStoreProductDeal\Service\Localized\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use HcbStoreProductDeal\Entity\Deal as DealEntity;
use HcCore\Service\Fetch\Paginator\ArrayCollection\ResourceDataServiceInterface;
use HcCore\Service\Filtration\Query\FiltrationServiceInterface;
use HcbStoreProduct\Service\Exception\InvalidResourceException;
use Zend\Stdlib\Parameters;

class FetchArrayCollectionService implements ResourceDataServiceInterface
{
    /**
     * @var FiltrationServiceInterface
     */
    protected $filtrationService;

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     * @param FiltrationServiceInterface $filtrationService
     */
    public function __construct(EntityManagerInterface $entityManager,
                                FiltrationServiceInterface $filtrationService)
    {
        $this->entityManager = $entityManager;
        $this->filtrationService = $filtrationService;
    }

    /**
     * @param DealEntity $dealEntity
     * @param Parameters $params
     *
*@return ArrayCollection
     * @throws InvalidResourceException
     */
    public function fetch($dealEntity, Parameters $params = null)
    {
        if ( !$dealEntity instanceof DealEntity) {
            throw new InvalidResourceException('dealEntity must be compatible with type HcbStoreProductDeal\Entity\Deal');
        }

        /* @var $localizedRepository \Doctrine\ORM\EntityRepository */
        $localizedRepository = $this->entityManager->getRepository('HcbStoreProductDeal\Entity\Deal\Localized');
        $qb = $localizedRepository->createQueryBuilder('l');

        $qb->join('l.locale', 'locale')
           ->where('l.deal = :deal');

        $qb->setParameter('deal', $dealEntity);

        if (is_null($params)) {
            $result = $qb->getQuery()->getResult();
        } else {
            $result = $this->filtrationService->apply($params, $qb, 'l', array('lang'=>'locale.locale'))
                           ->getQuery()->getResult();
        }

        if (!count($result)) {
            $result[0] = new DealEntity\Localized();
            $result[0]->setDeal( $dealEntity);
        }

        return new ArrayCollection($result);
    }
}
