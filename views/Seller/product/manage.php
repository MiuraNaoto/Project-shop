<?php
session_start();
$USER = $_SESSION[md5('user')];
$username =  $USER[1]["username"];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";
require "../../../query/query.php";
$request = $_POST['request'];
$myConDB = connectDB();

// echo $request . "<br>";

switch ($request) {
    case 'insert_product':

        $product_code = $_POST["product_code"];
        $product_name = $_POST["product_name"];
        $product_description = $_POST["product_description"];
        $product_specification = $_POST["product_specification"];
        $type_product =  $_POST["type_product"];
        $delivery_type = $_POST["delivery_type"];
        $price =  $_POST["price"];
        $price_transport = $_POST["price_transport"];
        $stock =  $_POST["stock"];
        $time = time();

        echo $product_code . " " . $product_name . " " . $product_description . " " . $product_specification . " " . $type_product  . " " . $price . " " . $price_transport .  " "  . $stock . " " . $delivery_type . "<br>";

        $sql = "SELECT `product_id` FROM `product` ORDER BY `product_id` DESC LIMIT 1";
        $id = selectDataOne($sql)['product_id'];

        $id_new = (int)$id + 1;
        echo $id_new;
        $path = "../../../img/product/" . $id_new . "/";
        if (!file_exists($path)) {
            mkdir("../../../img/product/" . $id_new);
        }

        $multiplefile = $_FILES['picture-product']['name'];

        echo "<br>" . print_r($multiplefile) . "<br>";

        foreach ($multiplefile as $name => $value) {

            $allowImg = array('png', 'jpeg', 'jpg');

            $fileExnt = explode('.', $multiplefile[$name]);

            $fileTmp = $_FILES['picture-product']['tmp_name'][$name];

            if ($fileExnt[1] == "png") {
                $newFile =      $name . '.' . $fileExnt[1];
            } else {
                $newFile =      $name . '.png';
            }

            echo $name;
            echo  "<br>" . $newFile . "<br>";

            $target_dir = $path . $newFile;
            echo "<br>path : " . $target_dir . "<br>";


            if ($_FILES['picture-product']['size'][$name] > 0 && $_FILES['picture-product']['error'][$name] == 0) {
                if (move_uploaded_file($fileTmp, $target_dir)) {
                    echo "success";
                }
            } else {
                echo "no picture";
            }
        }
        $picture_path = $id_new . "/";

        $profile_path = "../../../img/product/profile/";
        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions

        if ($_FILES['profile-product']) {
            $img = $_FILES['profile-product']['name'];
            $tmp = $_FILES['profile-product']['tmp_name'];

            // get uploaded file's extension
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            echo $ext;
            // can upload same image using rand function
            if ($ext == "png") {
                $final_image =  $id_new . "_" . $time . "." . $ext;
            } else {
                $final_image = $id_new . "_" . $time . ".png";
            }

            echo $final_image;
            // check's valid format
            if (in_array($ext, $valid_extensions)) {
                $profile_path = $profile_path . strtolower($final_image);
                echo  $profile_path;
                if (move_uploaded_file($tmp, $profile_path)) {
                    echo "profile success";
                }
            } else {
                echo 'invalid';
            }
        }

        $sql = "INSERT INTO `product`(`product_number`, `product_name`, `product_description`, `product_specification`, `product_type`, `price`, `shipping_cost`, `stock`, `uid`, `delivery_type`, `profile_product`, `picture`, `modify`) 
                VALUES ('$product_code','$product_name','$product_description','$product_specification','$type_product','$price','$price_transport','$stock','$uid','$delivery_type','$final_image',' $picture_path','$time')";
        addinsertData($sql);
        echo $sql;
        header("location: product.php");
        break;
    case 'delete':
        $product_id = $_POST["product_id"];
        // echo $product_id;

        $sql = "DELETE FROM `product` WHERE `product_id` = $product_id";
        deleteData($sql);
        // echo $sql;
        break;

    case 'view_qrcode':
        $product_id = $_POST["product_id"];
        // echo $product_id;

        $PRODUCT = getProductByID($product_id);
        // print_r($PRODUCT);
        $output = '
        <div class="row mb-4">
            <div class="col-lg-4 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                <img src="../../../img/qr-code/testqr.png" width="100%">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>รหัสสินค้า</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="' . $PRODUCT[1]["product_number"] . '" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ประเภทสินค้า</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="' . $PRODUCT[1]["type"] . '" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ชื่อสินค้า</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="' . $PRODUCT[1]["product_name"] . '" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                        <span>ราคาต่อชิ้น</span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" value="' . number_format($PRODUCT[1]["price"], 2) . '" disabled>
                    </div>
                </div>
            </div>
        </div>
        ';

        echo $output;
        break;
    case "edit_product":

        $product_id = $_POST["e_product_id"];
        $product_code = $_POST["e_product_code"];
        $product_name = $_POST["e_product_name"];
        $product_description = $_POST["e_product_description"];
        $product_specification = $_POST["e_product_specification"];
        $type_product =  $_POST["e_type_product"];
        $delivery_type = $_POST["e_delivery_type"];
        $price =  $_POST["e_price"];
        $price_transport = $_POST["e_price_transport"];
        $stock =  $_POST["e_stock"];

        $sql = "UPDATE `product` SET    `product_number`='$product_code',
                                        `product_name`='$product_name',
                                        `product_description`='$product_description',
                                        `product_specification`='$product_specification',
                                        `product_type`='$type_product',
                                        `price`='$price',
                                        `shipping_cost`='$price_transport',
                                        `stock`='$stock',
                                        `delivery_type`='$type_product'
                WHERE `product_id`='$product_id'";
        updateData($sql);
        // echo $sql;
        header("location: product.php");
        break;
}
