<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php'; 
$json = json_decode(file_get_contents('php://input'), true);
$id = $json["id"];
$email = $json["email"];
$email_check = preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/i', $email);
if($email != "-" && $email_check !=0 && $email != " ")
{
    $query = "SELECT `Email` FROM `user`";
    $result = $conn->query($query);
    $em ='';
    while($row = mysqli_fetch_array($result))
    {
        if($row['Email'] == $email)
        {
            $em = $row['Email'];
        }
    }
    if($em == $email)
    {
        echo '{"error":"อีเมลนี้มีผู้ใช้งานแล้ว"}';
    }
    else{

        $sql = "UPDATE user SET Email='$email' WHERE User_ID='$id'";
        $result = $conn->query($sql);
        
        $feedData=json_encode($email);
        
        echo '{"email":'.$feedData.'}';
    }

}

$conn->close();
?>