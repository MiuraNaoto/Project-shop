<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";
$time = time();

if ($USER[1]["u-is-saler"] == 1) {
    $typeid = 1;
    $_SESSION[md5('typeid')] = $typeid;
    header("location: ../../Seller/profile/profile.php");
} else {
    header("location: ../register-saler/register-seller.php");
    if (isset($_POST["request"]) == "register") {
        $final_image == '';
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
            } else {
                $final_image = "default_saler.png";
            }
        }

        $have_product = $_POST["have_product"];
        $havent_product = $_POST["havent_product"];
        $type_product = $_POST["type-product"];
        $amount_type_product = $_POST["amount_type_product"];
        $title = $_POST["title"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $tel = $_POST["tel"];
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

        $update_shop = "INSERT INTO `seller-list`(`shop_name`, `title_id`, `firstname`, `lastname`, `email`, `tel`, `address_shop`, `subdistrict_shop`, `have_product`, `seller_quantity_product`, `fulltime_staff`, `parttime_staff`, `donthave_staff`, `quantity_staff`, `time_opened`, `time_closed`, `profile_shop`, `is-blocked-saler`, `modify_saler`, `owner_id`) 
                VALUES ('$shop_name','$title','$firstname','$lastname','$email','$tel','$address','$subdistrict','$have_product','$amount_type_product','$fulltime','$parttime','$none','$amountataff','$time_open','$time_closed','$final_image','0','$time','$uid')";
        addinsertData($update_shop);


        $sql = "SELECT `shop_id` FROM `seller-list` ORDER BY `shop_id` DESC LIMIT 1";
        $shop_id = selectDataOne($sql)['shop_id'];

        $update_shop_id = "UPDATE `user-list` SET `u-is-saler`='1', `shop_id`='$shop_id' WHERE `uid`='$uid'";
        updateData($update_shop_id);

        for ($i = 0; $i < count($type_product); $i++) {
            $sql_saledemand = "INSERT INTO `sales_demand`(`product_type`, `shop_id`) VALUES ('$type_product[$i]','$shop_id')";
            $DATA = addinsertData($sql_saledemand);
            // echo $sql_saledemand . "<br>";
        }

        $sql_shop = "SELECT * FROM `seller-list` INNER JOIN `user-list` ON `seller-list`.`shop_id` = `user-list`.`shop_id` WHERE `uid` = $uid";
        $DATA_SHOP = selectData($sql_shop);
        $_SESSION[md5('shop')]   = $DATA_SHOP;
        $typeid = 1;
        $_SESSION[md5('typeid')] = $typeid;

        header("location: ../../Seller/profile/profile.php");
    }
}
