<?php
function format_phonenumber($phonenumber)
{
    if (preg_match('/^(\d{3})(\d{3})(\d{4})$/',  $phonenumber,  $matches)) {
        $result = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
    }
    return $result;
}

function format_banknumber($phonenumber)
{
    if (preg_match('/^(\d{3})(\d{1})(\d{5})(\d{1})$/',  $phonenumber,  $matches)) {
        $result = $matches[1] . '-' . $matches[2] . '-' . $matches[3] . '-' . $matches[4];
    }
    return $result;
}

function different_timestamp($timstamp)
{
    date_default_timezone_set("Asia/Bangkok");
    $current_date = date_create(date("Y-m-d H:i:s", time()));
    $timestamp_date = date_create(date("Y-m-d H:i:s",  $timstamp));

    $diff = date_diff($current_date, $timestamp_date);
    echo "เข้าร่วมเมื่อ " . $diff->format("%y ปี %m เดือน %d วัน %h ชั่วโมง %i นาที %s วินาที") . " ที่ผ่านมา";
}
