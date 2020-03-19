<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php'; 

$id = $_POST["id"];
$new = $_POST["new"];

$sql = "UPDATE user SET Password='$new' WHERE User_ID=$id";
$result = $conn->query($sql);

$conn->close();

?>