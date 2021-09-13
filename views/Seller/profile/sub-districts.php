<?php 
include('../../../dbConnect.php');
$sql = "SELECT * FROM subdistricts WHERE district_id = {$_GET['district_id']}";
$DATA = selectData( $sql );
echo json_encode($DATA);
?>