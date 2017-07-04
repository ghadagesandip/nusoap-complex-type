<?php
function getProductDetails($productId){

    $link = new mysqli("localhost", "root", "webwerks", "trainingapp");

    if ($link->connect_errno) {
        printf("Connect failed: %s\n", $link->connect_error);
        exit();
    }

    $responseArr = array();


    $query = "SELECT * FROM `products` LIMIT 5";

    if ($result = mysqli_query($link, $query)) {

        /* fetch associative array */
        while ($row = mysqli_fetch_assoc($result)) {

            array_push($responseArr,
                array(
                    'id' => $row["id"],
                    'name' =>$row["name"]
                )

            );
        }

        /* free result set */
        mysqli_free_result($result);
    }

     print_r($responseArr); exit;

//    $resource->free();
//    $link->close();


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