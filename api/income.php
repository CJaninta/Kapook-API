<?php

   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: *");
   header("Access-Control-Allow-Methods: *");
   require 'connect.php';
    
    $user_id = $_POST['user_id'];
    $list = $_POST['list'];
    $amount = $_POST['amount'];
    date_default_timezone_set("Asia/Bangkok");
    $date = date("d-M-Y / H:i:sa");
    $feedData = '';
    echo $date;
    if($user_id !=0 && $list!=" " && $amount!=" ")
    {
        $query = "INSERT INTO `income` (`List_name`,`Amount`,`Date`,`User_ID`) VALUES ('$list','$amount','$date','$user_id')";
        $conn->query($query);              
    }
   
?>