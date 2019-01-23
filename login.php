<?php 

//echo "<Pre>";print_r($_POST);exit;

session_start();
require 'config.php';
 unset($_SESSION['error']);
if (!empty($_POST['email']) && !empty($_POST['password'])) {
$email =  $_POST['email'];
$password =  $_POST['password'];
	$check_log = 'SELECT * from user where email="'.$email.'" AND password="'.$password.'" ';
	  $result = mysqli_query($conn, $check_log);
	  if ($result->num_rows > 0) {
	  	     $userData=$result->fetch_assoc();

	  	$data = array('user_id' =>$userData['user_id'] ,
	  		           'first_name'=>$userData['first_name'],
	  		           'last_name'=>$userData['last_name'],
	  		           'email'=>$userData['email'],
	  		           'logged_in'=>TRUE,
	  	             );

	  	$_SESSION['user_session']=$data;
	  		  	     	  //echo "<Pre>";print_r($_SESSION);exit;
	     //redirect to the home page
	  	   unset($_SESSION['error']);
$error="";
echo $error;
	  }else{

	  	$error="Email /  password Wrong";
	  	echo $error;
	  //	$_SESSION['error']="Email /  password Wrong";
	  // header("Location:dashboard.php"); 
	  }

	# code...
}




?>