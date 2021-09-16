<?php
session_start();
$USER = $_SESSION[md5('user')];
$uid = $USER[1]["uid"];
require "../../../dbConnect.php";
require "../../../query/query.php";
$request = $_POST['request'];
$myConDB = connectDB();

//echo $request . "<br>";

switch ($request) {

    case 'show_address':
        $userid = $_POST['uid'];
        $add = getAddressUser($userid);
        // print_r($add);
        
        for ($i = 1; $i < count($add); $i++) {
            $modal_data_address = '
            <div class="row mb-4">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                    <span>ที่อยู่<span class="text-danger"> *</span></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="address" name="address" value="' . $add[$i]['address'] . '" disabled>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                    <span>ตำบล/แขวง<span class="text-danger"> *</span></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="' . $add[$i]['subdistricts_name_in_thai'] . '" disabled>
                    
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                    <span>อำเภอ/เขต<span class="text-danger"> *</span></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="' . $add[$i]['districts_name_in_thai'] . '" disabled>
                    
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                    <span>จังหวัด<span class="text-danger"> *</span></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="' . $add[$i]['provinces_name_in_thai'] . '" disabled>
                    
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 d-flex justify-content-end d-flex align-items-center">
                    <span>รหัสไปรษณีย์ <span class="text-danger"> *</span></span>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" id="zipcode" name="zipcode" value="' . $add[$i]['provinces_name_in_thai'] . '" disabled>
                </div>
            </div>
            
            ';
            if($i != count($add) && $i != 1){
                echo '</br><hr></br>';
            }

            echo $modal_data_address;
        }

        
        //print_r($add);

        break;
}
