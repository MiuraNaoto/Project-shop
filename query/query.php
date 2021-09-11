<?php
include_once("../../../dbConnect.php");

function getUserTitle()
{
    $sql = "SELECT * FROM `user-title`";
    $DATA = selectData($sql);
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
