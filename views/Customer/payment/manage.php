<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

// echo $request . "<br>";

switch ($request) {

    case 'payment':
        $order_number = json_decode( $_POST["order_number"], true );
        $payment_method = $_POST["payment_method"];
        $select_bank = $_POST["select_bank"];
        $price = $_POST["price"];
        $date_payment = $_POST["date_payment"];
        $time_payment = $_POST["time_payment"];

        // echo $order_number . " " . $payment_method . " " . $select_bank . " " . $price . " " . $date_payment . " " . $time_payment . " " . "<br>";

        $datetime_payment = strtotime($date_payment . " " . $time_payment);

        // echo strtotime($date_payment . " " . $time_payment) . " " . "<br>";
        // echo date("Y-m-d H:i:s", strtotime($date_payment . " " . $time_payment)) . "<br>";

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
            // echo $ext . "<br>";
            // can upload same image using rand function
            if ($ext == "png") {
                $final_image =  $id_new . "_" . $time . "." . $ext;
            } else {
                $final_image = $id_new . "_" . $time . ".png";
            }

            // echo $final_image . "<br>";

            // check's valid format

            if (in_array($ext, $valid_extensions)) {
                $profile_path = $profile_path . strtolower($final_image);
                // echo  $profile_path;
                if (move_uploaded_file($tmp, $profile_path)) {
                    echo "profile success";
                }
            } else {
                echo 'invalid';
            }
        }

        $sql_order = "UPDATE `orders` SET `total_price_user`='$price',`type_payment`='$payment_method',`time_payment`='$datetime_payment',`picture_payment`='$final_image',`status_order`='2' 
                        WHERE `order_number`='$order_number'";

       
        updateData($sql_order);

        // echo $sql_order . "<br>";
        

        $sql = "SELECT * FROM `orders_detail` 
                                INNER JOIN `orders` ON `orders_detail`.`orders_id` = `orders`.`order_id` 
                                WHERE `orders`.`order_number` = '$order_number' 
                                ORDER BY `orders_detail`.`orders_id` DESC LIMIT 1";
        $orders_id = selectDataOne($sql)["orders_id"];

        // echo $orders_id . "<br>";

        $sql_order_detail = "UPDATE `orders_detail` SET `status_order`='2'
        WHERE `orders_id`='$orders_id'";
        updateData($sql_order_detail);
        // echo $sql_order_detail . "<br>";

        $detail = "SELECT * FROM `orders_detail`";
        selectData($detail);
        // print_r($DETAIL);

        for ($i = 1; $i < count($DETAIL); $i++) { 
            # code...
            $delete_order = "DELETE FROM `shopping_cart` WHERE `uid` = '$uid' AND `product_id` = '".$DETAIL[$i]['product_id']."' AND `quantity` = '".$DETAIL[$i]['quantity_product']."'";
            deleteData($delete_order);
        }

        break;
}
