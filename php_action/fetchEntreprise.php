<?php 	

require_once 'core.php';

$sql = "SELECT entreprise_id, entreprise_name, entreprise_adresse, entreprise_tel, entreprise_pays, entreprise_email, entreprise_site FROM entreprise ";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 while($row = $result->fetch_array()) {
 	$entrepriseId = $row[0];

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editEntrepriseModel" onclick="editEntreprise('.$entrepriseId.')"> <i class="glyphicon glyphicon-edit"></i>Modifier</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeEntreprise('.$entrepriseId.')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 
 		$row[2],
 		$row[3], 
 		$row[4], 
 		$row[5], 
 		$row[6], 		
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);