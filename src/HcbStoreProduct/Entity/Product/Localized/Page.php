<?php

namespace HcbStoreProduct\Entity\Product\Localized;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 */
class Page
{
    /**
     * @var \HcbStoreProduct\Entity\Product\Localized
     */
    private $localized;


    /**
     * Set localized
     *
     * @param \HcbStoreProduct\Entity\Product\Localized $localized
     * @return Page
     */
    public function setLocalized(\HcbStoreProduct\Entity\Product\Localized $localized = null)
    {
        $this->localized = $localized;

        return $this;
    }

    /**
     * Get localized
     *
     * @return \HcbStoreProduct\Entity\Product\Localized 
     */
    public function getLocalized()
    {
        return $this->localized;
    }
}
