<?php
namespace HcbStoreProductDeal\Entity;

use HcCore\Entity\EntityInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Deal
 *
 * @ORM\Table(name="store_product_deal")
 * @ORM\Entity
 */
class Deal implements EntityInterface
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
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    protected $enabled = false;

    /**
     * @var Deal\Localized
     *
     * @ORM\OneToMany(targetEntity="HcbStoreProductDeal\Entity\Deal\Localized", mappedBy="deal")
     * @ORM\OrderBy({"updatedTimestamp" = "DESC"})
     */
    protected $localized = null;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="HcbStoreProduct\Entity\Product", cascade={"persist"})
     * @ORM\JoinTable(name="store_product_deal_has_store_product",
     *   joinColumns={
     *     @ORM\JoinColumn(name="store_product_deal_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="store_product_id", referencedColumnName="id")
     *   }
     * )
     */
    protected $product;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_timestamp", type="datetime", nullable=false)
     */
    protected $createdTimestamp;
}
