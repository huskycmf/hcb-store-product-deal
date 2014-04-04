<?php

namespace HcbBlog\Entity\Post;

use Doctrine\ORM\Mapping as ORM;

/**
 * Data
 */
class Data
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
    private $lang;

    /**
     * @var string
     */
    private $preview;

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
     * @var \HcbBlog\Entity\Post
     */
    private $post;

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
     * Set title
     *
     * @param string $title
     * @return Data
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
     * Set lang
     *
     * @param string $lang
     * @return Data
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
     * Set preview
     *
     * @param string $preview
     * @return Data
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * Get preview
     *
     * @return string 
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Data
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
     * @return Data
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
     * @return Data
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
     * Set post
     *
     * @param \HcbBlog\Entity\Post $post
     * @return Data
     */
    public function setPost(\HcbBlog\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \HcbBlog\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set page
     *
     * @param \HcBackend\Entity\Page $page
     * @return Data
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
     * @return Data
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
