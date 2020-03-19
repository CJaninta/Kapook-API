<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php'; 

$json = json_decode(file_get_contents('php://input'), true);
$id = $json["id"];
$username = $json["user"];

if($username != "-" && $username != " ")
{
    $query = "SELECT `Username` FROM `user`";
    $result = $conn->query($query);
    $uname ='';
    while($row = mysqli_fetch_array($result))
    {
        if($row['Username'] == $username)
        {
            $uname = $row['Username'];
        }
    }
    if($uname == $username)
    {
        echo '{"error":"ชื่อนี้มีผู้ใช้งานแล้ว"}';
    }
    else{

        $sql = "UPDATE user SET Username='$username' WHERE User_ID='$id'";
        $result = $conn->query($sql);

        $feedData=json_encode($username);
        
        echo '{"feedData":'.$feedData.'}';
    }

}


$conn->close();

?>