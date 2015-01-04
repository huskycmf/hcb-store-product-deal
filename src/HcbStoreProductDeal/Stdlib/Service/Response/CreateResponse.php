<?php
namespace HcbStoreProductDeal\Stdlib\Service\Response;

use Zf2Libs\Stdlib\Response\DataInterface;
use Zf2Libs\Stdlib\Service\Response\ResourceInterface;
use Zf2Libs\Stdlib\Service\Response\Messages\Response;
use HcbStoreProductDeal\Stdlib\Response\Exception\InvalidArgumentException;

class CreateResponse extends Response implements DataInterface, ResourceInterface
{
    /**
     * @var number
     */
    protected $staticPageId;

    /**
     * @param number $staticPageId
     */
    public function setResource($staticPageId)
    {
        if (!is_numeric($staticPageId)) {
            throw new InvalidArgumentException("Invalid type of static page id, must be numeric");
        }

        $this->staticPageId = $staticPageId;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return array('id'=>$this->staticPageId);
    }
}
