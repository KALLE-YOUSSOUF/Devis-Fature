<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$productName 		= $_POST['editProductName']; 
  $quantity 			= $_POST['editQuantity'];
  $rate 					= $_POST['editRate'];
  $categoryName 	= $_POST['editCategoryName'];
  $productStatus 	= $_POST['editProductStatus'];

				
	$sql = "UPDATE product SET product_name = '$productName', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate', active = '$productStatus', status = 1 WHERE product_id = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Modification avec succes";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Erreur de mise à jour des infformations produit";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
