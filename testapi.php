<?php

// $curl = curl_init();

// curl_setopt_array($curl, array(
//     CURLOPT_URL => "https://data.tmd.go.th/nwpapi/v1/forecast/location/hourly/at?lat=13.10&lon=100.10&fields=tc,rh,slp,rain,ws10m,wd10m,ws925,ws850,ws700,ws500,ws200,wd925,wd850,wd700,wd500,wd200,cloudlow,cloudmed,cloudhigh,cond",
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_ENCODING => "",
//     CURLOPT_MAXREDIRS => 10,
//     CURLOPT_TIMEOUT => 30,
//     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//     CURLOPT_CUSTOMREQUEST => "GET",
//     CURLOPT_HTTPHEADER => array(
//         "accept: application/json",
//         "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQ3NTY1YTZkOWEwOGI2MjA1ZjY0YzVjNWFlMjNiY2U1MmRlNmFjNjJkOTFiYmMxNTJiZmJiZDBiODliMzg2MzM1NGQ4M2QyNTZiOTAzMzI2In0.eyJhdWQiOiIyIiwianRpIjoiNDc1NjVhNmQ5YTA4YjYyMDVmNjRjNWM1YWUyM2JjZTUyZGU2YWM2MmQ5MWJiYzE1MmJmYmJkMGI4OWIzODYzMzU0ZDgzZDI1NmI5MDMzMjYiLCJpYXQiOjE2MjYwNzI4ODcsIm5iZiI6MTYyNjA3Mjg4NywiZXhwIjoxNjU3NjA4ODg3LCJzdWIiOiIxNTI0Iiwic2NvcGVzIjpbXX0.ucGjHY4pAePn7ViPcZfvJxl-WiGr7jQ8bZNms1wvwAQo1C-CyxPyNzYMozyvWIYhHq7RwWHNimONkD6_zA1f5on9Xnf5HNwH_DdfwK-RJeBUk363dvrUGnNBwR_wd4hdbZK-G5Da2NSG04fcIUFgvdrRNrTXXhDwl3drydmmd922R9th1EbT3ALdi7YgYvTAbyj5rGbdr_dp0iyW174EG9psEpRce5gK5BKEv-NZs0ZL-zNuPgSvcommtXDAqSyjgAXRXXksgvs1RsHT_WW6Rnh1sP4yY_2svfcWe61FUQRBdFeQ3nRFJ_VPnTSANaLglS9SanRo08hQVYpIb7ybgYZwZCNCW3W7wX_8Z1cbTNPvs5cF6CaT-rnah7sT2xngkgIWF84HxR3lC-PbZ2hqo9UANWniwk4pG3TgmHoJu9cj2xIofH9Y2TxKoe4OxXuHARZ_CPdOxa68-w1zrnlyVvEioUlHImdlCNexcDWsxmLS6DRBaRw-4XNSZlriz7eM3WpnYGbjFprVqB6PBiOeO6qWmk-OCwzTscYMu_GvHFTKbgtrJgblXmSCEj6iQtTJ58rOMjrkjYH_T-GmMdKO9LpFWoSgM0EXh2kQ61Xevt8U1vm_2wUAOH3zshc7vOIsf97kiY5MblFX4h4skawmfpVmXzR19E_lw2ApVuJCo9M
//         ",
//     ),
// ));

// $response = curl_exec($curl);
// $err = curl_error($curl);

// $json2array = json_decode($response, true);
// $WeatherForecasts = $json2array["WeatherForecasts"];
// $forecasts = $WeatherForecasts[0]["forecasts"];
// curl_close($curl);

// if ($err) {
//     echo "cURL Error #:" . $err;
// } else {
//     // print_r($response);
//     echo print_r($forecasts) . "<br>";
// }

// echo md5("admin1nut1234");


$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://data.tmd.go.th/nwpapi/v1/forecast/location/hourly/at?lat=13.10&lon=100.10&fields=tc,rh,slp,rain,ws10m,wd10m,ws925,ws850,ws700,ws500,ws200,wd925,wd850,wd700,wd500,wd200,cloudlow,cloudmed,cloudhigh,cond",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array("accept: application/json", "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjRlYjhjYTRjMDQ0MTQ3ZTNlZWUxZDAzYzZmYTg1YWY3YTE3OWJlM2EzYjc2MmRkYTZjZTkxMzlmODgxMjFhMWI3NGIxNjExMWMxZTI1YzE2In0.eyJhdWQiOiIyIiwianRpIjoiNGViOGNhNGMwNDQxNDdlM2VlZTFkMDNjNmZhODVhZjdhMTc5YmUzYTNiNzYyZGRhNmNlOTEzOWY4ODEyMWExYjc0YjE2MTExYzFlMjVjMTYiLCJpYXQiOjE2MjYwNzM5ODgsIm5iZiI6MTYyNjA3Mzk4OCwiZXhwIjoxNjU3NjA5OTg4LCJzdWIiOiIxNTIwIiwic2NvcGVzIjpbXX0.S_2ZwoJCNWr6cj6MCYVH_ROzhX7zhep9yO4lDL7xwJmSbyKH6jn6o6sPBqUJ2MhuzkE6j0qEeiaX2mPngJblvRQzs1wbJ2M1xm7_2TEVlXKb49rohHNAo7emwYv7qCPcLewf5mTJy84Sc16HqSUVdYFNpY81m6p2REdr4V-jKArVZ8JmbrMZ8Rj8PQsF1grwZsdF2Kgp6QlzyRYYNMsofcipKhwbHIbc68oSe62fR8aKMILGkpw7y4-LswAdEOqceAo3J_IIMwPPAB2cLbtOus5iTOCFQoW7bMbyEmmltbihrw8t1d5yflopDLlZlv_2RYs8zfqfrHTwzlAINIfLbFCRbgP_OMxovakGFSKHiUcHxqnAq0eq64yKH_MPjutTtzxrZ2QevaMSIP_p1B4JKC4pjPxRubs8Ioay_WgRALYdkhcO13SD5YlKP6aS7BcEUYYX3NyIC1GnMJxERuJ4kfgVUL9xcQTytl9jgSp2A4Qyahq4BO9Q5Cf6vQb5-tXZQ-NU8FCU568uFf0idLcWv0lsswy6C9cfEdS_Bgm1c5NcqxBVcpaOT8A5dktVdM-nvFTC4p5W-W3YRt7gHs4cn8aMMC_MSRMABxD6vXcjgKjROPP2g9qMJki1SqC3wOVj4r0w-EziAaip0J_5VLEX9pbLpQcE_HxVHX8qMXcVy-E",),
));

$response = curl_exec($curl);
$err = curl_error($curl);
$json2array = json_decode($response, TRUE);
$WeatherForecasts = $json2array["WeatherForecasts"];
$location = $WeatherForecasts[0]["location"];
$forecasts = $WeatherForecasts[0]["forecasts"];
$data = $forecasts[0]["data"];

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    //echo $response;
    //lat = ละติจูด , lon = ลองจิจูด
    echo "lat,lon = ";
    print_r($location["lat"]);
    echo " ,";
    print_r($location["lon"]);

    //tc = อุณหภูมิที่ระดับพื้นผิว (°C)
    echo "<br><br>tc = ";
    print_r($data["tc"]);

    //rh = ความชื้นสัมพัทธ์ที่ระดับพื้นผิว (%)
    echo "<br>rh = ";
    print_r($data["rh"]);

    //slp = ความกดอากาศที่ระดับน้ำทะเล (hpa)
    echo "<br>slp = ";
    print_r($data["slp"]);

    //rain = ปริมาณฝนรายชั่วโมง (mm)
    echo "<br>rain = ";
    print_r($data["rain"]);

    //ws10m = ความเร็วลมที่ระดับความสูง 10 เมตร (m/s)
    echo "<br>ws10m = ";
    print_r($data["ws10m"]);

    //wd10m = ทิศทางลมที่ระดับความสูง 10 เมตร (degree)
    echo "<br>wd10m = ";
    print_r($data["wd10m"]);

    //ws 925, 850, 700, 500, และ 200 = ความเร็วลมที่ระดับความกดอากาศ NNN hpa (m/s)
    echo "<br>ws925 = ";
    print_r($data["ws925"]);
    echo "<br>ws850 = ";
    print_r($data["ws850"]);
    echo "<br>ws700 = ";
    print_r($data["ws700"]);
    echo "<br>ws500 = ";
    print_r($data["ws500"]);
    echo "<br>ws200 = ";
    print_r($data["ws200"]);

    // wd 925, 850, 700, 500, และ 200 = ทิศทางลมที่ระดับความกดอากาศ NNN hpa (degree)
    echo "<br>wd925 = ";
    print_r($data["wd925"]);
    echo "<br>wd850 = ";
    print_r($data["wd850"]);
    echo "<br>wd700 = ";
    print_r($data["wd700"]);
    echo "<br>wd500 = ";
    print_r($data["wd500"]);
    echo "<br>wd200 = ";
    print_r($data["wd200"]);

    //cloudlow = ปริมาณเมฆที่ความสูงระดับต่ำ (%)
    echo "<br>cloudlow = ";
    print_r($data["cloudlow"]);

    //cloudmed = ปริมาณเมฆที่ความสูงระดับกลาง (%)
    echo "<br>cloudmed = ";
    print_r($data["cloudmed"]);

    //cloudhigh = ปริมาณเมฆที่ความสูงระดับสูง (%)
    echo "<br>cloudhigh = ";
    print_r($data["cloudhigh"]);

    //cond = สภาพอากาศโดยทั่วไป
    // 1 = ท้องฟ้าแจ่มใส (Clear)
    // 2 = มีเมฆบางส่วน (Partly cloudy)
    // 3 = เมฆเป็นส่วนมาก (Cloudy)
    // 4 = มีเมฆมาก (Overcast)
    // 5 = ฝนตกเล็กน้อย (Light rain)
    // 6 = ฝนปานกลาง (Moderate rain)
    // 7 = ฝนตกหนัก (Heavy rain)
    // 8 = ฝนฟ้าคะนอง (Thunderstorm)
    // 9 = อากาศหนาวจัด (Very cold)
    // 10 = อากาศหนาว (Cold)
    // 11 = อากาศเย็น (Cool)
    // 12 = อากาศร้อนจัด (Very hot)
    echo "<br>cond = ";
    print_r($data["cond"]);
}
