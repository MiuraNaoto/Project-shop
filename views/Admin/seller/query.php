<?php
include_once("../../../dbConnect.php");

if($_SERVER['REQUEST_METHOD']=="POST") {
    $function = $_POST['call'];
    $id = $_POST['id'];
    if(function_exists($function) && $function === "blockSaler" ) {        
        blockSaler($id);
    } 
    else if(function_exists($function) && $function === "deleteSaler"){
       
        deleteSaler($id);
    }
    else if(function_exists($function) && $function === "unblockSaler"){
       
        unblockSaler($id);
    }
    else {
        echo 'Function Not Exists!!';
    }
}



function getAllSaler(){
    $sql = "SELECT * FROM `user-list` WHERE `u-is-saler`= 1 AND `u-is-admin`=0";
    $DATA = selectData($sql);
    return $DATA;
}

function blockSaler($id){
    //echo '<script>console.log("blockSaler is called...")</script>';
    //echo '<script>console.log("'. $id .'")</script>';
    $sql = 'UPDATE `user-list` SET `is-blocked-saler`="1" WHERE `uid`='.$id;
    updateData($sql);
    
   
}

function unblockSaler($id){
    //echo '<script>console.log("UnblockSaler is called...")</script>';
    //echo '<script>console.log("'. $id .'")</script>';
    
    $sql = 'UPDATE `user-list` SET `is-blocked-saler`="0" WHERE `uid`='.$id;
    updateData($sql);
    
   
}

function deleteSaler($id){
    //echo '<script>console.log("deleteSaler is called...")</script>';
    //echo '<script>console.log("'. $id .'")</script>';
    $sql = 'DELETE FROM `user-list` WHERE `uid`='.$id;
    deleteData($sql);
}

?>