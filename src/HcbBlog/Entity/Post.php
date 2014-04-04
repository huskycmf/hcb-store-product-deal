<?php

namespace HcbBlog\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 */
class Post
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
    private $data;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->data = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Post
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
     * @return Post
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
     * Add data
     *
     * @param \HcbBlog\Entity\Post\Data $data
     * @return Post
     */
    public function addDatum(\HcbBlog\Entity\Post\Data $data)
    {
        $this->data[] = $data;

        return $this;
    }

    /**
     * Remove data
     *
     * @param \HcbBlog\Entity\Post\Data $data
     */
    public function removeDatum(\HcbBlog\Entity\Post\Data $data)
    {
        $this->data->removeElement($data);
    }

    /**
     * Get data
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getData()
    {
        return $this->data;
    }
}
