
<?php 	

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT orders.order_id, orders.order_date, client.client_name, client.client_prenom, client.client_adresse, client.client_tel, orders.sub_total, orders.vat, orders.total_amount FROM orders INNER JOIN client ON orders.client_id = client.client_id WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();
$order_id = $orderData[0];
$orderDate = $orderData[1];
$clientName = $orderData[2];
$clientPrenom = $orderData[3];
$clientAdresse = $orderData[4];
$clientContact = $orderData[5];
$subTotal = $orderData[6];
$vat = $orderData[7];
$totalAmount = $orderData[8]; 





$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
	INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);
?>

    <a class="navbar-brand js-scroll-trigger">
          <img src="assests/images/logo.png" alt="" height="50px">
          <center><h5 class="col-md-9">INFORMATIQUE-TELECOMMUNICATION-ELECTRONIQUE-FORMATIONS-CONSEILS</h5>
          </center>
        </a>
   <?php      
 $table = '
        
  <h5 border="0" width="100%;" cellpadding="2" style="border:1px solid blue;">
  </h5>
 <table border="1" cellspacing="0" cellpadding="1" width="40%">
	<thead>
		<tr >
		<th width="20%;">Code:</th>
		<th width="20%;">'.'DEVIS-'.strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 4)).'</th>
		</tr>
		<tr >
		<th width="20%;">Date :</th>
		<th width="20%;">'.$orderDate.'</th>
		</tr>
		<tr>
		<th width="20%;">Nom :</th>
		<th width="20%;">'.$clientName.' '.$clientPrenom.'</t
		</tr>
		<tr>
		<th width="20%;">Adresse : </th>
		<th width="20%;">'.$clientAdresse.' </th>		
		</tr>
		<tr>
		<th width="20%;">Contact : </th>
		<th width="20%;">'.$clientContact.' </th>		
		</tr>
		
	</thead>
</table>
<table border="1" width="100%;"cellspacing="1" cellpadding="2">

	<tbody">
		<tr">
			<th width="20%;">Ref</th>
			<th width="20%;">Designation</th>
			<th width="20%;">Prix unitaire</th>
			<th width="20%;">Quantite</th>
			<th width="20%;">Montant HT</th>
		</tr>';

		$x = 1;
		while($row = $orderItemResult->fetch_array()) {			
						
			$table .= '<tr>
				<td width="20%;">'.$x.'</td>
				<td width="20%;">'.$row[4].'</td>
				<td width="20%;">'.$row[1].'</td>
				<td width="20%;">'.$row[2].'</td>
				<td width="20%;">'.$row[3].'</td>
			</tr>
			';
		$x++;
		} // /while

		$table .= '<table border="1" width="100%;" cellpadding="3">
		
			<tr>
			    <th rowspan="3" width="60%;"></th>  
			      <td  width="20%;">Total HT</td> 
			      <th width="20%;">'.$subTotal.'</th>
			  </tr>
			  <tr>
			    <td width="20%;">TVA (19%)</td>    
			    <th width="20%;">'.$vat.'</th>
			  </tr>
			<tr>
			    <th width="20%;">Total TTC</th>
			    <th bgcolor="green;" width="20%;">'.$totalAmount.'</th>  
			  </table>
		 <table border="1" width="100%;" cellpadding="20">
		   <tr >
			<td rowspan="2" width="50%;"> Arreter le présent devis à la somme de :<br> </td>
		   </tr>
		   <tr >
			<td width="50%;">Le Directeur General Daouda :<br> Cache</td>	
		   </tr>		
		</table>
		
	</tbody>
</table>
<a class="navbar-brand">
    <h5><center>RCCM-NI-NIA-2014-A-3633-NIF: 31439/P - Compte Bancaire: Banque Islamique du Niger - BIN: 251081615001/45 </center>
	    <center> Quatier Recasement, Niamey - Niger - BP:12 155 Niamey Niger </center>
	    <center> Tel: +227 96 59 83 11/ +277 91 01 22 12 </center>
	    <center> E-mail:contact@novatech.ne </center>
    </h5>

</a>
 ';


$connect->close();

echo $table;