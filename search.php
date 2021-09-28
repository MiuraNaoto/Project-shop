<?php
include_once("./dbConnect.php");

if (isset($_REQUEST["term"])) {
    $sql = "SELECT * FROM `product` WHERE `product_name` LIKE '" . $_REQUEST["term"] . "%'";
    $DATA = selectData($sql);

    for ($i = 1; $i < count($DATA); $i++) {
        // echo "<p>" . $DATA[$i]["product_name"] . "</p>";
        echo '  <div class="container-fluid bg-light">
        <a href="views/Customer/product_detail/product-details.php?product_id=' . $DATA[$i]["product_id"] . '">
                        <div class="row">
                            
                                <div class="col-md-4 mt-4">
                                    <img class="rounded float-left" src="./img/product/profile/' . $DATA[$i]["profile_product"] . '" alt="" height="auto" width="100%" style=" object-fit: cover;">
                                </div>
                                <div class="col-md-8 mt-4">
                                    <h4 >' . $DATA[$i]["product_name"] . '</h4>
                                    <h6> ฿ ' . $DATA[$i]["price"] . '</h6>
                                </div>
                          
                        </div>
                        </a>
                        <br>
                    </div>
                </div>
                ';
    }
}
