<?php 	

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$orderId = $_POST['orderId'];

if($orderId) { 

 $sql = "DELETE FROM orders WHERE order_id = {$orderId}";

 $orderItem = "UPDATE order_item SET total = 2 WHERE  order_id = {$orderId}";

 if($connect->query($sql) === TRUE && $connect->query($orderItem) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Suppression avec succès";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Erreur lors de la suppression de la marque";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST