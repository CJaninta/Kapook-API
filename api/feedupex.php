<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php'; 

$ex_id = $_POST["ex_id"];
$list = $_POST["list"];
$amount = $_POST["amount"];

if($list != "-" && $list != " ")
{
    $sql = "UPDATE expense SET List_name='$list' WHERE Ex_ID='$ex_id'";
    $result = $conn->query($sql);
}

if($amount != "-" && $amount != " ")
{
    $sql = "UPDATE expense SET Amount='$amount' WHERE Ex_ID='$ex_id'";
    $result = $conn->query($sql);
}

$conn->close();

?>