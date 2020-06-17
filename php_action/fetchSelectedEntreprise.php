<?php 	

require_once 'core.php';

$entrepriseId = $_POST['entrepriseId'];

$sql = "SELECT entreprise_id, entreprise_name, entreprise_adresse, entreprise_tel, entreprise_pays, entreprise_email, entreprise_site FROM entreprise WHERE entreprise_id = $entrepriseId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);