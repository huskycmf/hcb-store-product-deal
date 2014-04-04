<?php

namespace HcbStaticPage\Entity\StaticPage;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locale
 */
class Locale
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $lang;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $updatedTimestamp;

    /**
     * @var \DateTime
     */
    private $createdTimestamp;

    /**
     * @var \HcbStaticPage\Entity\StaticPage
     */
    private $staticPage;

    /**
     * @var \HcBackend\Entity\Page
     */
    private $page;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $image;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->image = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set lang
     *
     * @param string $lang
     * @return Locale
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Locale
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set updatedTimestamp
     *
     * @param \DateTime $updatedTimestamp
     * @return Locale
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
     * @return Locale
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
     * Set staticPage
     *
     * @param \HcbStaticPage\Entity\StaticPage $staticPage
     * @return Locale
     */
    public function setStaticPage(\HcbStaticPage\Entity\StaticPage $staticPage = null)
    {
        $this->staticPage = $staticPage;

        return $this;
    }

    /**
     * Get staticPage
     *
     * @return \HcbStaticPage\Entity\StaticPage 
     */
    public function getStaticPage()
    {
        return $this->staticPage;
    }

    /**
     * Set page
     *
     * @param \HcBackend\Entity\Page $page
     * @return Locale
     */
    public function setPage(\HcBackend\Entity\Page $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return \HcBackend\Entity\Page 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Add image
     *
     * @param \HcBackend\Entity\Image $image
     * @return Locale
     */
    public function addImage(\HcBackend\Entity\Image $image)
    {
        $this->image[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param \HcBackend\Entity\Image $image
     */
    public function removeImage(\HcBackend\Entity\Image $image)
    {
        $this->image->removeElement($image);
    }

    /**
     * Get image
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImage()
    {
        return $this->image;
    }
}
