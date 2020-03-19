<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php'; 

$json = json_decode(file_get_contents('php://input'), true); 
$user = $json['username']; 
$pass = $json['password']; 
$userData ='';
$query = "SELECT * FROM `user` WHERE `Username`='$user' AND `Password`='$pass'"; 

$result= $conn->query($query);
$rowCount=$result->num_rows;


 if($rowCount>0)
 {
     $userData = $result->fetch_object();
     $user_id=$userData->user_id;
     $userData = json_encode($userData);
     echo '{"userData":'.$userData.'}';

 }
 else 
 {
     echo '{"error":"'.$user."  ".$pass.'"}';
 }

 $conn->close();
?>