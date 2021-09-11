<?php
include_once("../../../dbConnect.php");

function getUserTitle()
{
    $sql = "SELECT * FROM `user-title`";
    $DATA = selectData($sql);
    return $DATA;
}

function getAddressUser($uid)
{
    $sql = "SELECT * FROM `delivery_address`
                    INNER JOIN `user-title` ON `delivery_address`.`title` = `user-title`.`id`
                    INNER JOIN `subdistricts` ON `delivery_address`.`subdistrict` = `subdistricts`.`id`
                    INNER JOIN `districts` ON `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    WHERE `delivery_address`.`uid` = $uid";
    $DATA = selectData($sql);
    print_r($DATA);
    return $DATA;
}

function getProvince()
{
    $sql = "SELECT * FROM `provinces`";
    $DATA = selectData($sql);
    return $DATA;
}

function getDistricts()
{
    $sql = "SELECT * FROM `districts`";
    $DATA = selectData($sql);
    return $DATA;
}

function getSubDistricts()
{
    $sql = "SELECT * FROM `subdistricts`";
    $DATA = selectData($sql);
    return $DATA;
}
