<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";
$time = time();

if ($USER[1]["u-is-saler"] == 1) {
    header("location: ../../Seller/profile/profile.php");
} else {
    header("location: ../register-saler/register-seller.php");
    if (isset($_POST["request"]) == "register") {
        if ($_FILES["shop-profile-img"]) {
            $profile_path = "../../../img/profile/saler/";
            $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions

            $img = $_FILES['shop-profile-img']['name'];
            $tmp = $_FILES['shop-profile-img']['tmp_name'];

            // get uploaded file's extension
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            echo $ext;
            // can upload same image using rand function
            if ($ext == "png") {
                $final_image =  $uid . "_" . $time . "." . $ext;
            } else {
                $final_image = $uid . "_" . $time . ".png";
            }

            // echo $final_image;
            // check's valid format
            if (in_array($ext, $valid_extensions)) {
                $profile_path = $profile_path . strtolower($final_image);
                // echo  $profile_path;
                if (move_uploaded_file($tmp, $profile_path)) {
                    echo "profile success";
                }
            }
        } else {
            $final_image = "default_saler.png";
        }

        $have_product = $_POST["have_product"];
        $havent_product = $_POST["havent_product"];
        $type_product = $_POST["type-product"];
        $amount_type_product = $_POST["amount_type_product"];
        $title = $_POST["title"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $fulltime = $_POST["fulltime"];
        $parttime = $_POST["parttime"];
        $none = $_POST["none"];
        $amountataff = $_POST["amountataff"];
        $time_open = $_POST["time_open"];
        $time_closed = $_POST["time_closed"];
        $shop_name = $_POST["shop-name"];
        $provice = $_POST["provice"];
        $district = $_POST["district"];
        $subdistrict = $_POST["subdistrict"];
        $address = $_POST["address"];

        // echo $have_product . "<br>";
        // echo $havent_product . "<br>";
        // echo "type_product :" . print_r($type_product) . "<br>";
        // echo $amount_type_product . "<br>";
        // echo $title . "<br>";
        // echo $firstname . "<br>";
        // echo $lastname . "<br>";
        // echo $email . "<br>";
        // echo $fulltime . "<br>";
        // echo $parttime . "<br>";
        // echo $none . "<br>";
        // echo $amountataff . "<br>";
        // echo $time_open . "<br>";
        // echo $time_closed . "<br>";
        // echo $shop_name . "<br>";
        // echo $provice . "<br>";
        // echo $district . "<br>";
        // echo $subdistrict . "<br>";
        // echo $address . "<br>";

        if (isset($have_product)) {
            $have_product = 1;
        } else {
            $have_product = 0;
        }

        if (isset($fulltime)) {
            $fulltime = 1;
        } else {
            $fulltime = 0;
        }

        if (isset($parttime)) {
            $parttime = 1;
        } else {
            $parttime = 0;
        }

        if (isset($none)) {
            $none = 1;
        } else {
            $none = 0;
        }

        $sql = "UPDATE `user-list` SET  `title_id`='$title',
                                        `firstname`='$firstname',
                                        `lastname`='$lastname',
                                        `email`='$email',
                                        `shop_name`='$shop_name',
                                        `address_shop`='$address',
                                        `subdistrict_shop`='$subdistrict',
                                        `have_product`='$have_product',
                                        `quantity_product`='$amount_type_product',
                                        `full_time_staff`='$fulltime',
                                        `temporary_staff`='$parttime',
                                        `donthave`='$none',
                                        `quantity_staff`='$amountataff',
                                        `time_open`='$time_open',
                                        `time_closed`='$time_closed',
                                        `profile_shop`='$final_image',
                                        `u-is-saler`='1',
                                        `modify_saler`='$time' 
                WHERE `uid`='$uid'";
        // echo $sql;
        $DATA = updateData($sql);
        // echo $DATA;

        for ($i = 0; $i < count($type_product); $i++) {
            $sql_saledemand = "INSERT INTO `sales_demand`(`product_type`, `uid`) VALUES ('$type_product[$i]','$uid')";
            $DATA = addinsertData($sql_saledemand);
        }

        $sql = "SELECT * FROM `user-list` WHERE `uid` = $uid";
        $DATA = selectData($sql);
        $_SESSION[md5('user')]   = $DATA;

        header("location: ../../Seller/profile/profile.php");
    }
}
