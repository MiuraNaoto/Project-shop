<?php
session_start();
$USER = $_SESSION[md5('user')];
$SELLER = $_SESSION[md5('shop')];
$username =  $USER[1]["username"];
$uid = $USER[1]["uid"];
$shop_id = $SELLER[1]["shop_id"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {

    case 'insert_bank':
        $banktype = $_POST["banktype"];
        $bankname = $_POST["bankname"];
        $bankcode = $_POST["bankcode"];

        // echo $banktype . "<br>";
        // echo $bankname . "<br>";
        // echo $bankcode . "<br>";
        $sql = "INSERT INTO `bank_account`(`account_code`, `account_name`, `bankid`, `shop_id`) VALUES ('$bankcode','$bankname','$banktype','$shop_id')";
        // echo $sql;
        $DATA = addinsertData($sql);
        // echo $DATA;

        header("location: ./profile.php");
        break;

    case 'edit_profile':

        $shop_name = $_POST["e_shop_name"];
        $title = $_POST["e_title"];
        $firstname = $_POST["e_firstname"];
        $lastname = $_POST["e_lastname"];
        $tel = $_POST["e_tel"];
        $email = $_POST["e_email"];
        $address = $_POST["e_address"];
        $provice = $_POST["e_provice"];
        $district = $_POST["e_district"];
        $subdistrict = $_POST["e_subdistrict"];
        $time_open = $_POST["e_time_opened"];
        $time_closed = $_POST["e_time_closed"];
        // $fulltime
        // $parttime
        // $none =;
        $amountataff = $_POST["e_amount_staff"];

        if (isset($_POST["e_fulltime"])) {
            $fulltime = 1;
        } else {
            $fulltime = 0;
        }
        if (isset($_POST["e_parttime"])) {
            $parttime = 1;
        } else {
            $parttime = 0;
        }
        if (isset($_POST["e_none"])) {
            $none = 1;
        } else {
            $none = 0;
        }

        $sql = "UPDATE `seller-list` SET    `tel`='$tel',
                                            `title_id`='$title',
                                            `firstname`='$firstname',
                                            `lastname`='$lastname',
                                            `email`='$email',
                                            `shop_name`='$shop_name',
                                            `address_shop`='$address',
                                            `subdistrict_shop`='$subdistrict',
                                            `fulltime_staff`='$fulltime',
                                            `parttime_staff`='$parttime',
                                            `donthave_staff`='$none',
                                            `quantity_staff`='$amountataff',
                                            `time_opened`='$time_open',
                                            `time_closed`='$time_closed'
                WHERE `shop_id`='$shop_id'";
        // echo $sql;
        $DATA = updateData($sql);
        // print_r($DATA);
        header("location: profile.php");
        break;

    case 'change_password':

        $uid = $SELLER[1]["uid"];
        $passowrd = $SELLER[1]["password"];
        $username = $SELLER[1]["username"];
        $current_password = md5($username . $_POST["current_password"]);
        $new_password = md5($username . $_POST["new_password"]);
        $confirm_new_password = md5($username . $_POST["confirm_new_password"]);


        if ($passowrd != $current_password) {
            echo '  <script>
                        alert("รหัสผ่านไม่ตรงกับรหัสผ่านปัจจุบัน");
                        location.href = "./profile.php"
                    </script>';
        } else {
            if ($passowrd == $new_password) {
                echo '  <script>
                            alert("รหัสผ่านใหม่ตรงกับรหัสผ่านปัจจุบัน");
                            location.href = "./profile.php"
                        </script>';
            } else {
                if ($new_password != $confirm_new_password) {
                    echo '  <script>
                                alert("รหัสผ่านใหม่ไม่ตรงกับรหัสผ่านยืนยัน");
                                location.href = "./profile.php"
                            </script>';
                } else {
                    $sql = "UPDATE `user-list` SET `password`='$new_password' WHERE `uid`='$uid'";
                    updateData($sql);
                    // echo $sql;
                    header("location: ../../../logout.php");
                }
            }
        }

        break;

    case 'updateprofile':

        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
        $path = '../../../img/profile/saler/'; // upload directory
        $uid = $_POST['uid'];
        $profile = "/img/profile/saler/" . $_POST["profile_shop"];
        $time = time();

        if ($_FILES['image']) {
            $profile = substr($profile, strrpos($profile, '/') + 1);
            $scan_dir = array_diff(scandir($path), array('..', '.'));
            if (in_array($profile, $scan_dir)) {
                unlink($path . "/" . $profile);
            }


            $img = $_FILES['image']['name'];
            $tmp = $_FILES['image']['tmp_name'];

            // get uploaded file's extension
            $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
            // echo $ext;
            // can upload same image using rand function
            if ($ext == "png") {
                $final_image = $uid . "_" . $time . "." . $ext;
            } else {
                $final_image = $uid . "_" . $time . ".png";
            }

            echo $final_image;
            // check's valid format
            if (in_array($ext, $valid_extensions)) {
                $path = $path . strtolower($final_image);
                if (move_uploaded_file($tmp, $path)) {
                    // echo "<img src='$path" . $final_image . "' />";
                    // $profile_path_1 = "picture/profile/cow/" . $final_image;
                    $sql = "UPDATE `seller-list` SET `profile_shop`='$final_image' WHERE `shop_id`='$shop_id'";
                    echo $sql;
                    updateData($sql);

                    $sql = "SELECT * FROM `seller-list` WHERE `shop_id` = $shop_id";
                    $DATA = selectData($sql);
                    $_SESSION[md5('shop')]   = $DATA;

                    header("location: profile.php");
                }
            } else {
                echo 'invalid';
            }
        }


        // header("location: ./profile.php");
        break;
    case "edit_bank":
        $baid = $_POST["e_baid"];
        $banktype = $_POST["e_banktype"];
        $bankname = $_POST["e_bankname"];
        $bankcode = $_POST["e_bankcode"];

        $sql = "UPDATE `bank_account` SET `account_code`='$bankcode',`account_name`='$bankname',`bankid`='$banktype' WHERE `baid`='$baid'";
        updateData($sql);

        header("location: ./profile.php");
        break;

    case "delete_bank":
        $baid = $_POST["baid"];
        $bank_code = $_POST["bank_code"];
        $account_name = $_POST["account_name"];
        echo $baid . " " . $bank_code . " " . $account_name;

        $sql = "DELETE FROM `bank_account` WHERE `bank_account`.`baid` = '$baid' AND `bank_account`.`account_code` = '$bank_code'";
        deleteData($sql);
        break;

    case 'insert_shipping_method':
        $type_delivery = $_POST["type_delivery"];
        $weight = $_POST["weight"];
        $price_w = $_POST["price_w"];

        echo $type_delivery . " " . $weight . " " . $price_w;

        $sql = "INSERT INTO `shipping_method`(`delivery_type`, `price_per_unit`, `weight_product`, `seller_id`) VALUES ('$type_delivery','$weight','$price_w','$shop_id')";
        addinsertData($sql);
        // echo $sql;
        header("location: ./profile.php");
        break;
}
