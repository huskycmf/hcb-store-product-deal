<?php
namespace HcbStoreProductDeal\Entity\Deal;

use HcBackend\Entity\PageBindInterface;
use HcBackend\Entity\PageInterface;
use HcbStoreProductDeal\Entity\Category;
use HcCore\Entity\EntityInterface;
use Doctrine\ORM\Mapping as ORM;
use HcCore\Entity\LocaleBindInterface;

/**
 * Localized
 *
 * @ORM\Table(name="store_product_deal_localized")
 * @ORM\Entity
 */
class Localized implements EntityInterface/*, PageBindInterface, LocaleBindInterface*/
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var Deal
     *
     * @ORM\ManyToOne(targetEntity="HcbStoreProductDeal\Entity\Deal", inversedBy="localized")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_product_deal_id", referencedColumnName="id")
     * })
     */
    protected $deal;

    /**
     * @var Page
     *
     * @ORM\OneToOne(targetEntity="HcbStoreProductDeal\Entity\Category\Localized\Page", mappedBy="localized")
     */
    protected $page;

    /**
     * @var Locale
     *
     * @ORM\OneToOne(targetEntity="HcCore\Entity\Locale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="locale_id", referencedColumnName="id")
     * })
     */
    protected $locale;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    protected $title;
}
