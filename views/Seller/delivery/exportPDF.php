<?php

require_once '../../../vendor/autoload.php';


$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        ]
    ],
    'default_font' => 'sarabun'
]);

ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exportPDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="table table-striped">
            <!-- <tr>
                <th>เลขที่</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เกรดเฉลี่ย</th>
            </tr> -->
            <?php
            for ($i = 0; $i < 100; $i++) {
            ?>


                <tr>
                    <td style="border: 1px solid black; padding: 20px;">
                        <span style="font-size: 16px; font-weight: bold;">ชื่อที่อยู่ผู้รับ</span>
                        <br>
                        <span>นายหมายมั่น มั่นหมาย<br>เลขที่ 1 หมู่ 6 ต.กำแพงแสน <br>อ.กำแพงแสน จ.นครปฐม 73140<br>0 3434 1550-3<br></span>
                        <br>
                    </td>
                    <td style="border: 1px solid black; padding: 20px;">
                        <span style="font-size: 16px; font-weight: bold;">ชื่อที่อยู่ผู้รับ</span>
                        <br>
                        <span>นายหมายมั่น มั่นหมาย<br>เลขที่ 1 หมู่ 6 ต.กำแพงแสน <br>อ.กำแพงแสน จ.นครปฐม 73140<br>0 3434 1550-3<br></span>
                        <br>
                    </td>
                    <td style="border: 1px solid black; padding: 20px;">
                        <span style="font-size: 16px; font-weight: bold;">ชื่อที่อยู่ผู้รับ</span>
                        <br>
                        <span>นายหมายมั่น มั่นหมาย<br>เลขที่ 1 หมู่ 6 ต.กำแพงแสน <br>อ.กำแพงแสน จ.นครปฐม 73140<br>0 3434 1550-3<br></span>
                        <br>
                    </td>

                </tr>
            <?php
            }
            ?>
        </table>
        <?php
        try {
            $html = ob_get_contents();
            ob_clean();
            $mpdf->WriteHTML($html);
            //$mpdf->Output("บัญชีรายชื่อผู้ใช้.pdf",'F');
            header('Content-Disposition: attachment; filename="รายที่อยู่จัดส่ง.pdf"');
            $mpdf->Output();
        } catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
            //       name used for catch
            // Process the exception, log, print etc.
            echo $e->getMessage();
        }

        exit;
        ?>
        <!-- <a href="MyReport.pdf" class="btn btn-primary">โหลดผลการเรียน (pdf)</a> -->
    </div>
</body>