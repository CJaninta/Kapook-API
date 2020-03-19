<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php';
$json = json_decode(file_get_contents('php://input'), true);

$user_id=$_POST['user_id'];
$in_id=$_POST['in_id'];
     
$query = "DELETE FROM `income` WHERE `User_ID`='$user_id' AND `In_ID`='$in_id'";
$result = $conn->query($query);
if($result)       
{        
    echo '{"success":"ลบรายการเรียบร้อย"}';
} else{
 
    echo '{"error":"Delete error"}';
}

?>