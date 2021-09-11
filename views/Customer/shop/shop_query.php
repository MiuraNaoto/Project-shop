<?php
include_once("../../../dbConnect.php");

function getAllProduct(){
    $sql = "SELECT * FROM `product`";
    $DATA = selectData($sql);
    return $DATA;
}

?>