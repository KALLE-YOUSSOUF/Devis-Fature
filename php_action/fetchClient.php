<?php 	

require_once 'core.php';

$sql = "SELECT client_id, client_name, client_prenom, client_adresse, client_tel, client_pays, client_email, client_active, client_status FROM client WHERE client_status = 1";
$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $activeClient = ""; 

 while($row = $result->fetch_array()) {
 	$clientId = $row[0];
 	// active 
 	if($row[7] == 1) {
 		// activate member
 		$activeClient = "<label class='label label-success'>Masculin</label>";
 	} else {
 		// deactivate member
 		$activeClient = "<label class='label label-danger'>Féminin</label>";
 	}

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editClientModel" onclick="editClient('.$clientId.')"> <i class="glyphicon glyphicon-edit"></i> Modifier</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeClient('.$clientId.')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 		
 		$row[1], 
 		$row[2], 
 		$row[3], 
 		$row[4], 
 		$row[5], 
 		$row[6],		
 		$activeClient,
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);