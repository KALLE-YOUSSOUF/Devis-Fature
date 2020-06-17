<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$clientName = $_POST['clientName'];
	$clientPrenom = $_POST['clientPrenom'];
	$clientAdresse = $_POST['clientAdresse'];
	$clientTel = $_POST['clientTel'];
	$clientPays = $_POST['clientPays'];
	$clientEmail = $_POST['clientEmail'];
  $clientStatus = $_POST['clientStatus']; 

	$sql = "INSERT INTO client (client_name, client_prenom, client_adresse, client_tel, client_pays, client_email,  client_active, client_status) VALUES ('$clientName', '$clientPrenom', '$clientAdresse', '$clientTel', '$clientPays', '$clientEmail', '$clientStatus', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Ajout avec succès";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Erreur lors de l'ajout";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST