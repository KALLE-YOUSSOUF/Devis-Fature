<?php
require_once "php_action/core.php";
?>
 <style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 0mm;  /* this affects the margin in the printer settings */
        }

        body 
        {
            background-color:#FFFFFF;        
            margin: 0px;  /* the margin on the content before printing */
      padding: 20px;
       }
     b, strong {
    font-weight: 100 !important;
}
     
    </style>

    <div class="pageheader">
      <h2><i class="fa fa-th-list"></i>Imprimer le réçu</h2>
    </div>

    
    <div class="contentpanel">
  
    <div id="ass" class="col-md-8 col-md-offset-2" style="
    border-style: solid;
    border-color: #bbb; background-color: #fff;"><br/>
  
  
    
    <div style="text-align:center"><img src="logo.png" alt="" height="30px"></div>
        
<?php   

$orderId = $_POST['orderId'];

$sql = "SELECT order_date, client_name, client_contact, sub_total, vat, total_amount FROM orders WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();
$orderDate = $orderData[0];
$clientName = $orderData[1];
$clientContact = $orderData[2];
$subTotal = $orderData[3];
$vat = $orderData[4];
$totalAmount = $orderData[5]; 
?>      

<div class="row">
<div class="col-md-12">
<h3><u>ID: </u></h3><b style="float:right; margin-top:40px;"> Date: &nbsp; &nbsp; <?php echo $orderDate['order_date']; ?> </b>

<b>Nom: &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $clientName['client_name']; ?></b><br/>

<b>Contact: &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $clientContact['client_contact']; ?></b><br/>

<b>Nom: &nbsp; &nbsp; &nbsp; &nbsp; <?php echo $clientName['client_name']; ?></b><br/>
<br/><br/>
</div>


<div class="col-md-6"></div>

  </div><!-- ROW-->     
        
        
        
<div class="table-responsive">
                <table class="table table-success mb30">
                    <thead>
                      <tr>
                        <th>Ref</th>
                        <th>Designation</th>
                        <th>Prix unitaire</th>
                      </tr>
                    </thead>
                    <tbody>

                   

                     
                  
  
<?php
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
      <td rowspan="2" width="50%;"> Arreter le present Devis a la somme de:<br> Deux cent mille </td>
       </tr>
       <tr >
      <td width="50%;">Le Directeur General Daouda<br> Cache</td> 
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

?>
      
  </tbody>
                </table>
                
                <div style='margin-left:40%;'><b>Signature de personnel</b></div><br/><br/>
        <div style='margin-left:40%;'><b>Signature client</b></div>
                
            </div>
      
      
  <br/><br/><br/><br/>    
        <br/>
      
      
      
            </div>
      
    <div class="pull-right">
        <a href="" onClick="printContent('ass')" class="btn btn-info"><i class="icon-print icon-large"></i> Imprimer</a>
        </div>  
    

    </div><!-- contentpanel -->
    


  
</section>

</body>
</html>



