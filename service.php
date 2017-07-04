<?php
require_once 'functions.php';
require_once 'lib/nusoap.php';

$server = new nusoap_server();

$server->configureWSDL('soap3', 'urn:soap3');


$server->wsdl->addComplexType('return_productImages',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array('id' => 'id', 'type' => 'xsd:int'),
        'product_id' => array('product_id' => 'product_id', 'type' => 'xsd:int'),
        'image' => array('image' => 'image', 'type' => 'xsd:string')
    )
);


$server->wsdl->addComplexType('return_array_php',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array('id' => 'id', 'type' => 'xsd:int'),
        'product_category_id' => array('product_category_id' => 'product_category_id', 'type' => 'xsd:int'),
        'name' => array('name' => 'name', 'type' => 'xsd:string'),
        'producer' => array('producer' => 'producer', 'type' => 'xsd:string'),
        "product_images"=>array(
            array(
                'ref'=>'SOAP-ENC:arrayType',
                'wsdl:arrayType'=>'tns:return_productImages[]'
            )
        ),
        'tns:return_productImages'
    )
);

$server->wsdl->addComplexType(
    'dataArray',    // MySoapObjectArray
    'complexType', 'array', '', 'SOAP-ENC:Array',
    array(),
    array(
        array(
            'ref'=>'SOAP-ENC:arrayType',
            'wsdl:arrayType'=>'tns:return_array_php[]'
        )
    ),
    'tns:return_array_php'
);

$server->register(
    'getProductDetails',
    array("productId"=>"xsd:int"),
    array('return'=>'tns:dataArray'),
    'soap3', //$namespace,
    false,
    'rpc',
    'encoded',
    'description'
);

//$server->register(
//    "getPrice", // name of function
//    array("name"=>"xsd:string"),  // inputs
//    array("return"=>"xsd:string")   // outputs
//);


//$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
$input = @$server->service(file_get_contents("php://input"));



?>