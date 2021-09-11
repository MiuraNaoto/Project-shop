<?php 
function format_phonenumber($phonenumber)
{
    if (preg_match('/^(\d{3})(\d{3})(\d{4})$/',  $phonenumber,  $matches)) {
        $result = $matches[1] . '-' . $matches[2] . '-' . $matches[3];
    }
    return $result;
}
