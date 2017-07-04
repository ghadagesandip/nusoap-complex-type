<?php
require 'lib/nusoap.php';

$client = new nusoap_client("http://localhost/soap3/service.php?wsdl"); // Create a instance for nusoap client

if(isset($_POST))
{

    $name = 'abc';
    $response = $client->call('getPrice',array("name"=>$name));

    if(empty($response))
        echo "Price of that product is not available";
    else
        echo $response;
}

?>
