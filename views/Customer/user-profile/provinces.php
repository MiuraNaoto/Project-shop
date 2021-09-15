<?php 
include('../../../dbConnect.php');
$sql = "SELECT * FROM provinces";
$DATA = selectData( $sql );
echo json_encode($DATA);
?>
