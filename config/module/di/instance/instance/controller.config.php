<?php
return array(
    // Product
    'HcbStoreProductDeal-Controller-Collection-List' => array(
        'parameters' => array(
            'paginatorDataFetchService' =>
                'HcbStoreProductDeal-Service-Collection-FetchQbBuilder',
            'viewModel' => 'HcbStoreProductDeal-Paginator-ViewModel-JsonModel'
        )
    ),

    'HcbStoreProductDeal-Controller-View' => array(
        'parameters' => array(
            'fetchService' => 'HcbStoreProductDeal-Service-FetchService',
            'extractor' => 'HcbStoreProductDeal-Stdlib-Extractor-Resource'
        )
    ),

    'HcbStoreProductDeal-Controller-Create' => array(
        'parameters' => array(
            'serviceCommand' => 'HcbStoreProductDeal-Service-Create',
            'jsonResponseModelFactory' =>
                'HcbStoreProductDeal-Json-View-StatusMessageDataModelFactory'
        )
    ),

    'HcbStoreProductDeal-Controller-Collection-Delete' => array(
        'parameters' => array(
            'inputData' => 'HcbStoreProductDeal-Data-Collection-Entities-ByIds',
            'serviceCommand' => 'HcbStoreProductDeal-Service-Collection-Delete',
            'jsonResponseModelFactory' =>
                'HcbStoreProductDeal-Json-View-StatusMessageDataModelFactory'
        )
    ),

    // Localized
    'HcbStoreProductDeal-Controller-Localized-Collection-List' => array(
        'parameters' => array(
            'fetchService' => 'HcbStoreProductDeal-Service-FetchService',
            'paginatorDataFetchService' =>
                'HcbStoreProductDeal-Service-Localized-Collection-FetchArrayCollection',
            'viewModel' => 'HcbStoreProductDeal-Paginator-ViewModel-JsonModel-Localized'
        )
    ),

    'HcbStoreProductDeal-Controller-Localized-Update' => array(
        'parameters' => array(
            'inputData' => 'HcbStoreProductDeal-Data-Localized',
            'fetchService' => 'HcbStoreProductDeal-Service-FetchService-Localized',
            'serviceCommand' => 'HcbStoreProductDeal-Service-Localized-UpdateCommand',
            'jsonResponseModelFactory' =>
                'HcbStoreProductDeal-Json-View-StatusMessageDataModelFactory'
        )
    ),

    'HcbStoreProductDeal-Controller-Localized-Create' => array(
        'parameters' => array(
            'inputData' => 'HcbStoreProductDeal-Data-Localized',
            'fetchService' => 'HcbStoreProductDeal-Service-FetchService',
            'serviceCommand' => 'HcbStoreProductDeal-Service-Localized-CreateCommand',
            'jsonResponseModelFactory' =>
                'HcbStoreProductDeal-Json-View-StatusMessageDataModelFactory'
        )
    )
);
