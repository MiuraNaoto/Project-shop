<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";

$request = $_POST['request'];
$myConDB = connectDB();

echo $request . "<br>";

switch ($request) {

    case 'insert_address':

        $title = $_POST["title"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $tel = $_POST["tel"];
        $provice = $_POST["provice"];
        $district = $_POST["district"];
        $subdistrict = $_POST["subdistrict"];
        $address = $_POST["address"];

        // echo $uid . "<br>";
        // echo $title . "<br>";
        // echo $firstname . "<br>";
        // echo $lastname . "<br>";
        // echo $provice . "<br>";
        // echo $district . "<br>";
        // echo $subdistrict . "<br>";
        // echo $address . "<br>";

        $sql = "INSERT INTO `delivery_address`(`uid`, `title`, `firstname`, `lastname`, `tel`, `address`, `subdistrict`) VALUES ('$uid','$title','$firstname','$lastname','$tel','$address','$subdistrict')";
        $DATA = addinsertData($sql);

        header("location: ./user-profile.php");
        break;

    case 'edit_user':
        $username = $_POST["e_username"];
        $tel = $_POST["e_tel"];

        // echo $username . "<br>";
        // echo $tel . "<br>";

        $sql = "UPDATE `user-list` SET `username`='$username', `tel`='$tel' WHERE `uid`='$uid'";
        $DATA = updateData($sql);
        header("location: ./user-profile.php");
        break;

    case 'updateprofile':

        $valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
        $path = '../../../img/profile/user/'; // upload directory
        $uid = $_POST['uid'];
        $profile = "/img/profile/user/" . $_POST["profile_user"];
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
                    $sql = "UPDATE `user-list` SET `profile_user`='$final_image' WHERE `uid`='$uid'";
                    echo $sql;
                    updateData($sql);

                    $sql = "SELECT * FROM `user-list` WHERE `uid` = $uid";
                    $DATA = selectData($sql);
                    $_SESSION[md5('user')]   = $DATA;

                    header("location: user-profile.php");
                }
            } else {
                echo 'invalid';
            }
        }
        // header("location: ./profile.php");
        break;

    case 'edit_address':
        $adid = $_POST["ea_adid"];
        $title = $_POST["ea_title"];
        $firstname = $_POST["ea_firstname"];
        $lastname = $_POST["ea_lastname"];
        $tel = $_POST["ea_tel"];
        $provice = $_POST["ea_provice"];
        $district = $_POST["ea_district"];
        $subdistrict = $_POST["ea_subdistrict"];
        $address = $_POST["ea_address"];

        $sql = "UPDATE `delivery_address` SET   `title`='$title',
                                                `firstname`='$firstname',
                                                `lastname`='$lastname',
                                                `tel`='$tel',
                                                `address`='$address',
                                                `subdistrict`='$subdistrict' 
                WHERE `daid`='$adid'";
        updateData($sql);
        header("location: user-profile.php");
        break;
}

unset($_POST);
unset($_SESSION);
