<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$valid = array('facture' => array(), 'facture_item' => array());

$sql = "SELECT facture.facture_id, facture.order_date, facture.client_id, facture.sub_total, facture.vat, facture.total_amount, facture.discount, facture.grand_total, facture.paid, facture.due, facture.payment_type, facture.payment_status FROM facture 	
	WHERE facture.facture_id = {$orderId}";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['facture'] = $data;


$connect->close();

echo json_encode($valid);