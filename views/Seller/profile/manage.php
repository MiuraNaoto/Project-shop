<?php
session_start();
$USER = $_SESSION[md5('user')];
$username =  $USER[1]["username"];
$uid = $USER[1]["uid"];
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
        $sql = "INSERT INTO `bank_account`(`account_code`, `account_name`, `bankid`, `uid`) VALUES ('$bankcode','$bankname','$banktype','$uid')";
        // echo $sql;
        $DATA = addinsertData($sql);
        // echo $DATA;

        header("location: ./profile.php");
        break;

    case 'change_password':

        $new_password = $_POST["new_password"];
        $new_password = md5($username . $new_password);
        echo $new_password . "<br>";

        $sql = "UPDATE `user-list` SET `password`='$new_password' WHERE `uid`='$uid'";
        // echo $sql;
        $DATA = updateData($sql);
        // echo $DATA;

        // session_destroy();
        header("location: ../../../index.php");
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
                    $sql = "UPDATE `user-list` SET `profile_shop`='$final_image' WHERE `uid`='$uid'";
                    echo $sql;
                    updateData($sql);

                    $sql = "SELECT * FROM `user-list` WHERE `uid` = $uid";
                    $DATA = selectData($sql);
                    $_SESSION[md5('user')]   = $DATA;

                    header("location: profile.php");
                }
            } else {
                echo 'invalid';
            }
        }


        // header("location: ./profile.php");
        break;
}
