<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php';
$user_id = $_POST['user_id'];

$user_id = '67';
$acin = [];
$acex = [];

$in = "SELECT * FROM income WHERE User_ID = $user_id";
$result = $conn->query($in); 
$acin = mysqli_fetch_all($result,MYSQLI_ASSOC);

$ex = "SELECT * FROM expense WHERE User_ID = $user_id";
$result = $conn->query($ex); 

$acex = mysqli_fetch_all($result,MYSQLI_ASSOC);
$ac=json_encode($acin).json_encode($acex);
echo $ac;
?>