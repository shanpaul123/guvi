<?php 

session_start();
require 'config.php';
if (!isset($_SESSION['user_session']['user_id'])) {
	header('location:index.html');
}
$user_id=$_SESSION['user_session']['user_id'];

$sql='SELECT * from user_details WHERE user_id="'.$user_id.'"  ';
 $result = mysqli_query($conn, $sql);
	  if ($result->num_rows > 0) {
	  	     $userData=$result->fetch_assoc();
       $user_details=$userData;
	  	     $data['status'] = 1;
	  	   
	$json = file_get_contents('results.json');
$userdata = json_decode($json);
	$html ="<table class='table table-striped'>
<thead>
    <tr>
      <th scope='col'>S.No</th>
      <th scope='col'>Phone No</th>
      <th scope='col'>Degree</th>
      <th scope='col'>Salary</th>
      <th scope='col'>gender</th>
      <th scope='col'>Age</th>
    </tr>
  </thead>
  <tbody>";
			//echo "<prE>";print_r($value);

	foreach ($userdata as $key => $value) {
	if (array_key_exists('phone_no',$value)) {
	  	     $html .= " <tr>
      <th scope='row'>". $key++."</th>
      <td> ". $value->phone_no."</td>
      <td>".$value->degree."</td>
      <td>".$value->salary."</td>
      <td>".$value->gender."</td>
      <td>".$value->age."</td>
    </tr>";
}
}
$html .="</tbody></table>";
}else{

	$html = "";
}
echo $html;

?>