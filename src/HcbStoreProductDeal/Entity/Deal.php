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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->localized = new \Doctrine\Common\Collections\ArrayCollection();
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Deal
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return Deal
     */
    public function setCreatedTimestamp($createdTimestamp)
    {
        $this->createdTimestamp = $createdTimestamp;

        return $this;
    }

    /**
     * Get createdTimestamp
     *
     * @return \DateTime 
     */
    public function getCreatedTimestamp()
    {
        return $this->createdTimestamp;
    }

    /**
     * Add localized
     *
     * @param \HcbStoreProductDeal\Entity\Deal\Localized $localized
     * @return Deal
     */
    public function addLocalized(\HcbStoreProductDeal\Entity\Deal\Localized $localized)
    {
        $this->localized[] = $localized;

        return $this;
    }

    /**
     * Remove localized
     *
     * @param \HcbStoreProductDeal\Entity\Deal\Localized $localized
     */
    public function removeLocalized(\HcbStoreProductDeal\Entity\Deal\Localized $localized)
    {
        $this->localized->removeElement($localized);
    }

    /**
     * Get localized
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocalized()
    {
        return $this->localized;
    }

    /**
     * Add product
     *
     * @param \HcbStoreProduct\Entity\Product $product
     * @return Deal
     */
    public function addProduct(\HcbStoreProduct\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \HcbStoreProduct\Entity\Product $product
     */
    public function removeProduct(\HcbStoreProduct\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get product
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProduct()
    {
        return $this->product;
    }
}
