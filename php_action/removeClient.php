<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$clientId = $_POST['clientId'];

if($clientId) { 

 $sql = "UPDATE client SET client_status = 2 WHERE client_id = {$clientId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST