<?php
function getProductDetails($productId){

    $mysqli = new mysqli("localhost", "root", "webwerks", "trainingapp");

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }






    $result[0] = array(
        "id"  => 1,
        "product_category_id"   => 225,
        "name"    => "FYI",
        "producer" => "sandip ghadge",
        "product_images" => array(
            array(
                "id"=>1,
                "product_id" => 2,
                "image" => "adasdasd"
            ),
            array(
                "id"=>2,
                "product_id" => 2,
                "image" => "test 2"
            )
        )
    );



    return $result;


}

?>