<?php 
include('../../../dbConnect.php');
$sql = "SELECT * FROM districts WHERE province_id = {$_GET['province_id']}";
$DATA = selectData( $sql );
echo json_encode($DATA);
?>
