<?php 	

require_once 'core.php';

$clientId = $_POST['clientId'];

$sql = "SELECT client_id, client_name, client_prenom, client_adresse, client_tel, client_pays, client_email, client_active, client_status FROM client WHERE client_id = $clientId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);