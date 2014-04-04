<?php
namespace HcbStoreProductDeal\Entity\Deal\Localized;

use Doctrine\ORM\Mapping as ORM;
use HcBackend\Entity\MappedPage;
use HcbStoreProductDeal\Entity\Deal\Localized;
use HcCore\Entity\EntityInterface;

/**
 * Page
 *
 * @ORM\Table(name="store_product_deal_localized_page")
 * @ORM\Entity
 */
class Page extends MappedPage implements EntityInterface
{
    /**
     * @var Localized
     *
     * @ORM\OneToOne(targetEntity="HcbStoreProductDeal\Entity\Deal\Localized", inversedBy="page")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_product_deal_localized_id", referencedColumnName="id")
     * })
     */
    protected $localized;

    /**
     * Set localized
     *
     * @param \HcbStoreProductDeal\Entity\Deal\Localized $localized
     * @return Page
     */
    public function setLocalized(\HcbStoreProductDeal\Entity\Deal\Localized $localized = null)
    {
        $this->localized = $localized;

        return $this;
    }

    /**
     * Get localized
     *
     * @return \HcbStoreProductDeal\Entity\Deal\Localized
     */
    public function getLocalized()
    {
        return $this->localized;
    }
}
