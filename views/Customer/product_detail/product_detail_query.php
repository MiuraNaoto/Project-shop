<?php

include_once("../../../dbConnect.php");

function getProductDetail($product_id){
    $sql = 'SELECT * FROM `user-list` NATURAL JOIN `sales_demand` NATURAL JOIN `product_type` NATURAL JOIN `product` WHERE `product_id`=' . $product_id;
    $DATA = selectData($sql);
    return $DATA;
}

function countProduct($shop_name){
    $sql = 'SELECT COUNT(product_id) AS "count_product" FROM `user-list` NATURAL JOIN `sales_demand` NATURAL JOIN `product_type` NATURAL JOIN `product` WHERE `shop_name`="' . $shop_name . '"';
    $DATA = selectData($sql);
    return $DATA;
}

function getRelateProducts($shop_name, $product_type){
    $sql = 'SELECT * FROM `user-list` NATURAL JOIN `sales_demand` NATURAL JOIN `product_type` NATURAL JOIN `product` WHERE `type`="'. $product_type .'" ORDER BY RAND()';
    $DATA = selectData($sql);
    return $DATA;
}

function getShopName($product_id){
    $sql = 'SELECT shop_name FROM `user-list` NATURAL JOIN `sales_demand` NATURAL JOIN `product_type` NATURAL JOIN `product` WHERE `product_id`=' . $product_id;
    $DATA = selectData($sql);
    return $DATA;
}

?>