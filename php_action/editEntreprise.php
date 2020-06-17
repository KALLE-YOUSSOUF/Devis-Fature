<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$entrepriseName = $_POST['editEntrepriseName'];
	$entrepriseAdresse = $_POST['editEntrepriseAdresse'];
	$entrepriseTel = $_POST['editEntrepriseTel'];
	$entreprisePays = $_POST['editEntreprisePays'];
  	$entrepriseEmail = $_POST['editEntrepriseEmail'];
  	$entrepriseSite = $_POST['editEntrepriseSite']; 
  	$entrepriseId = $_POST['entrepriseId'];

	$sql = "UPDATE entreprise SET entreprise_name = '$entrepriseName', entreprise_adresse = '$entrepriseAdresse', entreprise_tel = '$entrepriseTel', entreprise_pays = '$entreprisePays', entreprise_email = '$entrepriseEmail', entreprise_site = '$entrepriseSite' WHERE entreprise_id = '$entrepriseId'";

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