<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$entrepriseName = $_POST['entrepriseName'];
	$entrepriseAdresse = $_POST['entrepriseAdresse'];
	$entrepriseTel = $_POST['entrepriseTel'];
	$entreprisePays = $_POST['entreprisePays'];
	$entrepriseEmail = $_POST['entrepriseEmail'];
	$entrepriseSite = $_POST['entrepriseSite'];


	$sql = "INSERT INTO entreprise (entreprise_name, entreprise_adresse, entreprise_tel, entreprise_pays, entreprise_email, entreprise_site) VALUES ('$entrepriseName', '$entrepriseAdresse', '$entrepriseTel', '$entreprisePays', '$entrepriseEmail','$entrepriseSite')";

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