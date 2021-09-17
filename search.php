<?php
include_once("./dbConnect.php");

if (isset($_REQUEST["term"])) {
    $sql = "SELECT * FROM `product` WHERE `product_name` LIKE '" . $_REQUEST["term"] . "%'";
    $DATA = selectData($sql);

    for ($i = 1; $i < count($DATA); $i++) {
        // echo "<p>" . $DATA[$i]["product_name"] . "</p>";
        echo '  <div class="container-fluid bg-light">
                        <div class="row">
                            <div class="col-md-4">
                                <img class="rounded float-left" src="./img/product/profile/' . $DATA[$i]["profile_product"] . '" alt="" height="100px" width="100px">
                            </div>
                            <div class="col-md-8">
                                <h6>' . $DATA[$i]["product_name"] . '</h6>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                ';
    }
}
