<?php

namespace HcbStoreProductCategory\Entity\Category;

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
     * @var string
     */
    private $description;

    /**
     * @var \DateTime
     */
    private $updatedTimestamp;

    /**
     * @var \DateTime
     */
    private $createdTimestamp;

    /**
     * @var \HcbStoreProductCategory\Entity\Category
     */
    private $category;

    /**
     * @var \HcbStoreProductCategory\Entity\Category\Localized\Page
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
     * Set description
     *
     * @param string $description
     * @return Localized
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
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
     * Set category
     *
     * @param \HcbStoreProductCategory\Entity\Category $category
     * @return Localized
     */
    public function setCategory(\HcbStoreProductCategory\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \HcbStoreProductCategory\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set page
     *
     * @param \HcbStoreProductCategory\Entity\Category\Localized\Page $page
     * @return Localized
     */
    public function setPage(\HcbStoreProductCategory\Entity\Category\Localized\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \HcbStoreProductCategory\Entity\Category\Localized\Page 
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
