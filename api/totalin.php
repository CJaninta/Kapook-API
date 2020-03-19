<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
require 'connect.php';

    $json = json_decode(file_get_contents('php://input'), true);
    $user_id=$json['user_id'];
    
    $query = "SELECT * FROM `income` WHERE `User_ID`=$user_id ORDER BY `In_ID` DESC ";
    $result = $conn->query($query); 

    $total = 0;
    while($row=mysqli_fetch_array($result))
    {
        $total+=$row['Amount'];
    }
    
    echo '{"totalin":'.$total.'}';
    
?>