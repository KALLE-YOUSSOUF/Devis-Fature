<?php 	

require_once 'core.php'; 

$sql = "SELECT facture.facture_id, facture.order_date, facture.client_id, client.client_tel, facture.payment_status, client.client_name, client.client_prenom FROM facture INNER JOIN client ON facture.client_id = client.client_id  WHERE order_status = 1";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 
 $paymentStatus = ""; 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM facture_item WHERE facture_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();


 	// active 
 	if($row[4] == 1) { 		
 		$paymentStatus = "<label class='label label-success'>Reglement total</label>";
 	} else if($row[4] == 2) { 		
 		$paymentStatus = "<label class='label label-info'>Acompte</label>";
 	} else { 		
 		$paymentStatus = "<label class='label label-warning'>Non Regler</label>";
 	} // /else

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="facture.php?o=editFact&i='.$orderId.'" id="editFactureModalBtn"> <i class="glyphicon glyphicon-edit"></i> Modifier</a></li>

	    <li><a type="button" onclick="printFacture('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>
	    
	    <li><a type="button" data-toggle="modal" data-target="#removeFactureModal" id="removeFactureModalBtn" onclick="removeFacture('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>       
	  </ul>
	</div>';		

 	$output['data'][] = array( 		
 		// image
 		$x,
 		// order date
 		$row[1],
 		// client name
 		$row[5].' '.$row[6],
 		// client contact
 		$row[3], 		 	
 		$itemCountRow, 		 	
 		$paymentStatus,
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);