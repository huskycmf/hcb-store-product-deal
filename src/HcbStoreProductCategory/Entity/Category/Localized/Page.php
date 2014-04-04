<?php

namespace HcbStoreProductCategory\Entity\Category\Localized;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 */
class Page
{
    /**
     * @var \HcbStoreProductCategory\Entity\Category\Localized
     */
    private $localized;


    /**
     * Set localized
     *
     * @param \HcbStoreProductCategory\Entity\Category\Localized $localized
     * @return Page
     */
    public function setLocalized(\HcbStoreProductCategory\Entity\Category\Localized $localized = null)
    {
        $this->localized = $localized;

        return $this;
    }

    /**
     * Get localized
     *
     * @return \HcbStoreProductCategory\Entity\Category\Localized 
     */
    public function getLocalized()
    {
        return $this->localized;
    }
}
