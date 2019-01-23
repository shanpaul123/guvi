<?php 
   session_start();
require 'config.php';
//echo "<pre>";print_r($_POST);exit;
$data = array('phone_no' => $_POST['phone_no'],
              'degree' => $_POST['degree'], 
              'salary' => $_POST['salary'], 
              'address' => $_POST['address'], 
              'gender' => $_POST['gender'], 
              'age' => $_POST['age'], 
              'school_name' => $_POST['school_name'], 
              'user_id' =>$_SESSION['user_session']['user_id'], 
	        );
//echo "<pre>";print_r($data);exit;

$sql = "INSERT INTO user_details (phone_no, degree, salary,address,gender,age,school_name,user_id)
VALUES ('".$data['phone_no']."', '".$data['degree']."', '".$data['salary']."', '".$data['address']."', '".$data['gender']."', '".$data['age']."', '".$data['school_name']."', '".$data['user_id']."')";

if ($conn->query($sql) === TRUE) {
//echo "<pre>";print_r($data);exit;

$json = file_get_contents('results.json');
$userdata = json_decode($json);
$userdata[] = $data;
file_put_contents('results.json', json_encode($userdata));
   // header("Location:dashboard.php"); 		  	     	  

echo TRUE;
} else {
    echo FALSE;
}


?>

