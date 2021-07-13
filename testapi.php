<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://data.tmd.go.th/nwpapi/v1/forecast/location/hourly/at?lat=13.10&lon=100.10&fields=tc,rh,slp,rain,ws10m,wd10m,ws925,ws850,ws700,ws500,ws200,wd925,wd850,wd700,wd500,wd200,cloudlow,cloudmed,cloudhigh,cond",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "accept: application/json",
        "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQ3NTY1YTZkOWEwOGI2MjA1ZjY0YzVjNWFlMjNiY2U1MmRlNmFjNjJkOTFiYmMxNTJiZmJiZDBiODliMzg2MzM1NGQ4M2QyNTZiOTAzMzI2In0.eyJhdWQiOiIyIiwianRpIjoiNDc1NjVhNmQ5YTA4YjYyMDVmNjRjNWM1YWUyM2JjZTUyZGU2YWM2MmQ5MWJiYzE1MmJmYmJkMGI4OWIzODYzMzU0ZDgzZDI1NmI5MDMzMjYiLCJpYXQiOjE2MjYwNzI4ODcsIm5iZiI6MTYyNjA3Mjg4NywiZXhwIjoxNjU3NjA4ODg3LCJzdWIiOiIxNTI0Iiwic2NvcGVzIjpbXX0.ucGjHY4pAePn7ViPcZfvJxl-WiGr7jQ8bZNms1wvwAQo1C-CyxPyNzYMozyvWIYhHq7RwWHNimONkD6_zA1f5on9Xnf5HNwH_DdfwK-RJeBUk363dvrUGnNBwR_wd4hdbZK-G5Da2NSG04fcIUFgvdrRNrTXXhDwl3drydmmd922R9th1EbT3ALdi7YgYvTAbyj5rGbdr_dp0iyW174EG9psEpRce5gK5BKEv-NZs0ZL-zNuPgSvcommtXDAqSyjgAXRXXksgvs1RsHT_WW6Rnh1sP4yY_2svfcWe61FUQRBdFeQ3nRFJ_VPnTSANaLglS9SanRo08hQVYpIb7ybgYZwZCNCW3W7wX_8Z1cbTNPvs5cF6CaT-rnah7sT2xngkgIWF84HxR3lC-PbZ2hqo9UANWniwk4pG3TgmHoJu9cj2xIofH9Y2TxKoe4OxXuHARZ_CPdOxa68-w1zrnlyVvEioUlHImdlCNexcDWsxmLS6DRBaRw-4XNSZlriz7eM3WpnYGbjFprVqB6PBiOeO6qWmk-OCwzTscYMu_GvHFTKbgtrJgblXmSCEj6iQtTJ58rOMjrkjYH_T-GmMdKO9LpFWoSgM0EXh2kQ61Xevt8U1vm_2wUAOH3zshc7vOIsf97kiY5MblFX4h4skawmfpVmXzR19E_lw2ApVuJCo9M
        ",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

$json2array = json_decode($response, true);
$WeatherForecasts = $json2array["WeatherForecasts"];
$forecasts = $WeatherForecasts[0]["forecasts"];
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // print_r($response);
    echo print_r($forecasts) . "<br>";
}
