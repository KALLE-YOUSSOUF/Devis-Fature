<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$entrepriseId = $_POST['entrepriseId'];

if($entrepriseId) { 

 $sql = "DELETE FROM entreprise WHERE entreprise_id = {$entrepriseId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Suppression avec succès";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Erreur lors de la suppression";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST