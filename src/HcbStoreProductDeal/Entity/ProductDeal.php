<?php
namespace HcbStoreProductDeal\Entity;

use HcbStoreProduct\Entity\Product;
use HcCore\Entity\EntityInterface;
use Doctrine\ORM\Mapping as ORM;
use Zf2FileUploader\Entity\Image;

/**
 * ProductDeal
 *
 * @ORM\Table(name="store_product_deal_has_store_product")
 * @ORM\Entity
 */
class ProductDeal implements EntityInterface
{
    /**
     * @var Product
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="HcbStoreProduct\Entity\Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_product_id", referencedColumnName="id")
     * })
     */
    private $product;

    /**
     * @var Deal
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="HcbStoreProductDeal\Entity\Deal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="store_product_deal_id", referencedColumnName="id")
     * })
     */
    private $deal;


    /**
     * Set product
     *
     * @param \HcbStoreProduct\Entity\Product $product
     * @return ProductDeal
     */
    public function setProduct(\HcbStoreProduct\Entity\Product $product)
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
     * Set deal
     *
     * @param \HcbStoreProductDeal\Entity\Deal $deal
     * @return ProductDeal
     */
    public function setDeal(\HcbStoreProductDeal\Entity\Deal $deal)
    {
        $this->deal = $deal;

        return $this;
    }

    /**
     * Get deal
     *
     * @return \HcbStoreProductDeal\Entity\Deal 
     */
    public function getDeal()
    {
        return $this->deal;
    }
}
