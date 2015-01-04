<?php
namespace HcbStoreProductDeal\Data;

use HcCore\Data\DataMessagesInterface;
use HcCore\Stdlib\Extractor\Request\Payload\Extractor;
use Zend\Di\Di;
use Zend\Http\PhpEnvironment\Request;
use HcCore\InputFilter\InputFilter;


class Localized extends InputFilter implements LocalizedInterface, DataMessagesInterface
{
    /**
     * @param Request $request
     * @param Extractor $dataExtractor
     * @param Di $di
     */
    public function __construct(Request $request,
                                Extractor $dataExtractor,
                                Di $di) {
        /* @var $input \HcBackend\InputFilter\Input\Locale */
        $input = $di->get( 'HcBackend\InputFilter\Input\Locale',
            array( 'name' => 'lang' ) )
                    ->setRequired( true );
        $this->add( $input );

        $this->add( array(
            'name'       => 'title',
            'required'   => true,
            'allowEmpty' => false,
            'validators' => array(
                array(
                    'name'    => 'string_length',
                    'options' => array(
                        'min' => 1,
                        'max' => 300
                    )
                )
            ),
            'filters'    => array( array( 'name' => 'StringTrim' ) )
        ) );

        $this->add( array(
            'name'       => 'startDate',
            'required'   => true,
            'validators' => array( array( 'name' => 'date' ) )
        ) );

        $this->add( array(
            'name'       => 'endDate',
            'required'   => false,
            'validators' => array( array( 'name' => 'date' ) )
        ) );

        $this->add( array(
            'name'       => 'value',
            'required'   => true,
            'validators' => array( array( 'name' => 'digits' ) )
        ) );

        $this->add( array(
            'name'       => 'strategy',
            'required'   => true
        ) );

        $this->add( array( 'name' => 'products[]', 'required' => true ) );

        $this->setData( $dataExtractor->extract( $request ) );
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getValue('title');
    }

    /**
     * @return string
     */
    public function getStrategyValue()
    {
        return $this->getValue('value');
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->getValue('lang');
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return new \DateTime($this->getValue('startDate'));
    }

    /**
     * @return \DateTime | null
     */
    public function getEndDate()
    {
        $endDate = $this->getValue('endDate');
        if (!empty($endDate)) {
            return new \DateTime($this->getValue('endDate'));
        }
        return null;
    }

    /**
     * @return string
     */
    public function getStrategy()
    {
        return $this->getValue('strategy');
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        return $this->getValue('products[]');
    }
}
