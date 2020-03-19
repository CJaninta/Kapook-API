<?php
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: *");
   header("Access-Control-Allow-Methods: *");
   require 'connect.php';

   $json = json_decode(file_get_contents('php://input'), true);
   $uname = $json['username'];
   $password= $json['password'];
   $email = $json['email'];
   $rowCount = -1;

   $email_check = preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/i', $email);

   if($email_check==0) {
        echo '{"error":"กรุณากรอก Email ให้ถูกต้อง"}';
   }
   else if(strlen(trim($uname))>0 && strlen(trim($password))>0 && strlen(trim($email))>0){
   $us = "SELECT * FROM `user` WHERE `Username`='$uname' OR `Email`='$email'";
   $result = $conn->query($us);
   $rowCount=$result->num_rows;
   $objQuery = mysqli_query($conn,$us);
   
   if($rowCount == 0){
   $user = "INSERT INTO `user`(`Username`,`Password`,`Email`) VALUES ('$uname','$password','$email')";
   $query = mysqli_query($conn,$user);

   $userData ='';
   $query = "select * from user where Username='$uname' and Password='$password'";
   $result= $conn->query($query);
   $userData = $result->fetch_object();
   $user_id=$userData->user_id;
   $userData = json_encode($userData);
   echo '{"userData":'.$userData.'}';
   /*if($query)
   {
       echo "New";
   }
   else{
       echo mysqli_error($conn);
   }*/
   
   }
   else {
        echo '{"error":"มีชื่อผู้ใช้หรืออีเมลนี้แล้ว กรุณากรอกข้อมูลใหม่"}';
   }
   }

?>