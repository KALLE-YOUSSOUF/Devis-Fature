<?php 	

require_once 'core.php';

$sql = "SELECT orders.order_id, orders.order_date, orders.client_id, client.client_tel, client.client_name, client.client_prenom FROM orders INNER JOIN client ON orders.client_id = client.client_id ";
$result = $connect->query($sql);



$output = array('data' => array());

if($result->num_rows > 0) { 
 $x = 1;

 while($row = $result->fetch_array()) {
 	$orderId = $row[0];

 	$countOrderItemSql = "SELECT count(*) FROM order_item WHERE order_id = $orderId";
 	$itemCountResult = $connect->query($countOrderItemSql);
 	$itemCountRow = $itemCountResult->fetch_row();

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="orders.php?o=editOrd&i='.$orderId.'" id="editOrderModalBtn"> <i class="glyphicon glyphicon-edit"></i> Modifier</a></li>

	    <li><a type="button" onclick="printOrder('.$orderId.')"> <i class="glyphicon glyphicon-print"></i> Imprimer </a></li>

	    <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$orderId.')"> <i class="glyphicon glyphicon-trash"></i> Supprimer</a></li>       
	  </ul>
	</div>';		

 	$output['data'][] = array( 		
 		// image
 		$x,
 		// order date
 		$row[1],
 		// client name
 		$row[4].' '.$row[5],
 		// client contact
 		$row[3], 		 	
 		$itemCountRow, 		 	
 		// button
 		$button 		
 		); 	
 	$x++;
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);