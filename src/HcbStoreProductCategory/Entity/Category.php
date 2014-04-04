<?php

namespace HcbStoreProductCategory\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var integer
     */
    private $priority;

    /**
     * @var \DateTime
     */
    private $createdTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $localized;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $product;

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
     * @return Category
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
     * Set priority
     *
     * @param integer $priority
     * @return Category
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return Category
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
     * @param \HcbStoreProductCategory\Entity\Category\Localized $localized
     * @return Category
     */
    public function addLocalized(\HcbStoreProductCategory\Entity\Category\Localized $localized)
    {
        $this->localized[] = $localized;

        return $this;
    }

    /**
     * Remove localized
     *
     * @param \HcbStoreProductCategory\Entity\Category\Localized $localized
     */
    public function removeLocalized(\HcbStoreProductCategory\Entity\Category\Localized $localized)
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
     * @return Category
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
