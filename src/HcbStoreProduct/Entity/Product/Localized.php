<?php

namespace HcbStoreProduct\Entity\Product;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localized
 */
class Localized
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var \DateTime
     */
    private $updatedTimestamp;

    /**
     * @var \DateTime
     */
    private $createdTimestamp;

    /**
     * @var \HcbStoreProduct\Entity\Product
     */
    private $product;

    /**
     * @var \HcbStoreProduct\Entity\Product\Localized\Page
     */
    private $page;

    /**
     * @var \HcCore\Entity\Locale
     */
    private $locale;


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
     * Set title
     *
     * @param string $title
     * @return Localized
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set updatedTimestamp
     *
     * @param \DateTime $updatedTimestamp
     * @return Localized
     */
    public function setUpdatedTimestamp($updatedTimestamp)
    {
        $this->updatedTimestamp = $updatedTimestamp;

        return $this;
    }

    /**
     * Get updatedTimestamp
     *
     * @return \DateTime 
     */
    public function getUpdatedTimestamp()
    {
        return $this->updatedTimestamp;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return Localized
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
     * Set product
     *
     * @param \HcbStoreProduct\Entity\Product $product
     * @return Localized
     */
    public function setProduct(\HcbStoreProduct\Entity\Product $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \HcbStoreProduct\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set page
     *
     * @param \HcbStoreProduct\Entity\Product\Localized\Page $page
     * @return Localized
     */
    public function setPage(\HcbStoreProduct\Entity\Product\Localized\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \HcbStoreProduct\Entity\Product\Localized\Page 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set locale
     *
     * @param \HcCore\Entity\Locale $locale
     * @return Localized
     */
    public function setLocale(\HcCore\Entity\Locale $locale = null)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return \HcCore\Entity\Locale 
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
