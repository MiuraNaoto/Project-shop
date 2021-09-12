<?php
include_once("../../../dbConnect.php");

// PART-USER
function getUserTitle()
{
    $sql = "SELECT * FROM `user-title`";
    $DATA = selectData($sql);
    return $DATA;
}

function getUser($uid)
{
    $sql = "SELECT * FROM `user-list` WHERE `uid` = $uid";
    $DATA = selectData($sql);
    return $DATA;
}

function getsalerInfo($uid)
{
    $sql = "SELECT * FROM `user-list` 
                    INNER JOIN `user-title` ON `user-list`.`title_id` = `user-title`.`id`
                    INNER JOIN `subdistricts` ON `user-list`.`subdistrict_shop` = `subdistricts`.`id`
                    INNER JOIN `districts` ON  `subdistricts`.`district_id` = `districts`.`id`
                    INNER JOIN `provinces` ON `districts`.`province_id` = `provinces`.`id`
                    WHERE `uid` = $uid";
    $DATA = selectData($sql);
    return $DATA;
}

function getBankAccount($uid)
{
    $sql = "SELECT * FROM `bank_account` 
                    INNER JOIN `bank` ON `bank_account`.`bankid` = `bank`.`id`
                    WHERE `uid` = $uid";
    $DATA = selectData($sql);
    return $DATA;
}

function getBank()
{
    $sql = "SELECT * FROM `bank`";
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
    return $DATA;
}

// PART-LOCATION 
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

// PART-PRODUCT
function getProductType()
{
    $sql = "SELECT * FROM `product_type`";
    $DATA = selectData($sql);
    return $DATA;
}
