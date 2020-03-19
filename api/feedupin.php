<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php'; 

$in_id = $_POST["in_id"];
$list = $_POST["list"];
$amount = $_POST["amount"];

if($list != "-" && $list != " ")
{
    $sql = "UPDATE income SET List_name='$list' WHERE In_ID='$in_id'";
    $result = $conn->query($sql);
}

if($amount != "-" && $amount != " ")
{
    $sql = "UPDATE income SET Amount='$amount' WHERE In_ID='$in_id'";
    $result = $conn->query($sql);
}

$conn->close();

?>