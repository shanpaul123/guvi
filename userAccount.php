<?php
//start session
session_start();
//load and initialize user class
require 'config.php';
unset($_SESSION['reg_error']);
 if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){

        //password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
          
            $reg_error="Confirm password must match with the password.";
           //  header("Location:registration.php"); 
        }else{

        	   $sql = 'SELECT * from user where email="'.$_POST['email'].'"';
   $result = mysqli_query($conn, $sql);
   
if (mysqli_num_rows($result) > 0) {

            $reg_error="Email Id already Exit";
             //header("Location:registration.php"); 
   }else{
//echo "<pre>";print_r($_POST);exit;
    $data = array('first_name' => $_POST['first_name'],
              'last_name' => $_POST['last_name'], 
              'email' => $_POST['email'], 
              'phone' => $_POST['phone'], 
              'password' => $_POST['password'], 
            
          );
//echo "<pre>";print_r($data);exit;

$sql = "INSERT INTO user (first_name, last_name, email,phone,password)
VALUES ('".$data['first_name']."', '".$data['last_name']."', '".$data['email']."', '".$data['phone']."', '".$data['password']."')";

if ($conn->query($sql) === TRUE) {
     $reg_error="success";

  }

    
   }
}
}
echo $reg_error;exit;
  // mysqli_close($conn);