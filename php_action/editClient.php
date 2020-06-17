<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$clientName = $_POST['editClientName'];
	$clientPrenom = $_POST['editClientPrenom'];
	$clientAdresse = $_POST['editClientAdresse'];
	$clientTel = $_POST['editClientTel'];
	$clientPays = $_POST['editClientPays'];
  	$clientEmail = $_POST['editClientEmail']; 
  	$clientStatus = $_POST['editClientStatus']; 
  	$clientId = $_POST['clientId'];

	$sql = "UPDATE client SET client_name = '$clientName', client_prenom = '$clientPrenom', client_adresse = '$clientAdresse', client_tel = '$clientTel', client_pays = '$clientPays', client_email = '$clientEmail', client_active = '$clientStatus' WHERE client_id = '$clientId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Mise à jour avec succès";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Erreur lors de la mise à jour";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST