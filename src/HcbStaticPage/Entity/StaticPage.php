<?php

namespace HcbStaticPage\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaticPage
 */
class StaticPage
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $enabled;

    /**
     * @var \DateTime
     */
    private $createdTimestamp;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $locale;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locale = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param integer $enabled
     * @return StaticPage
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return integer 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return StaticPage
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
     * Add locale
     *
     * @param \HcbStaticPage\Entity\StaticPage\Locale $locale
     * @return StaticPage
     */
    public function addLocale(\HcbStaticPage\Entity\StaticPage\Locale $locale)
    {
        $this->locale[] = $locale;

        return $this;
    }

    /**
     * Remove locale
     *
     * @param \HcbStaticPage\Entity\StaticPage\Locale $locale
     */
    public function removeLocale(\HcbStaticPage\Entity\StaticPage\Locale $locale)
    {
        $this->locale->removeElement($locale);
    }

    /**
     * Get locale
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocale()
    {
        return $this->locale;
    }
}
