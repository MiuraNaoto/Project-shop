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
