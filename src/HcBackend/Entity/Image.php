<?php

namespace HcBackend\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 */
class Image
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $alt;

    /**
     * @var string
     */
    private $httpPath;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $token;

    /**
     * @var boolean
     */
    private $temporary;

    /**
     * @var \DateTime
     */
    private $createdTimestamp;


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
     * Set alt
     *
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string 
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set httpPath
     *
     * @param string $httpPath
     * @return Image
     */
    public function setHttpPath($httpPath)
    {
        $this->httpPath = $httpPath;

        return $this;
    }

    /**
     * Get httpPath
     *
     * @return string 
     */
    public function getHttpPath()
    {
        return $this->httpPath;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return Image
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string 
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set temporary
     *
     * @param boolean $temporary
     * @return Image
     */
    public function setTemporary($temporary)
    {
        $this->temporary = $temporary;

        return $this;
    }

    /**
     * Get temporary
     *
     * @return boolean 
     */
    public function getTemporary()
    {
        return $this->temporary;
    }

    /**
     * Set createdTimestamp
     *
     * @param \DateTime $createdTimestamp
     * @return Image
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
}
