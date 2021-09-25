<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {

    case 'payment':
        $ordernumber = $_POST["ordernumber"] ;
        echo $ordernumber;

        $time = time();
        $sql = "SELECT `order_id` FROM `orders` ORDER BY `order_id` DESC LIMIT 1";
        $id = selectDataOne($sql)['order_id'];

        $id_new = (int)$id + 1;
        $profile_path = "../../../img/payment/bill/";
        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions

        if ($_FILES['picture-payment']) {
            $img = $_FILES['picture-payment']['name'];
            $tmp = $_FILES['picture-payment']['tmp_name'];

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

        $update_pic_payment = "UPDATE `orders` SET `picture_payment`='[value-11]' WHERE ";

        break;
}
