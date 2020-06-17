<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>Devis - Facture - Stock</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">
  .container {
  background-color: #DADBDD;
}
  #example-navbar-collapse {
  background-color: #fff;
}
.navbar-default .navbar-nav > li > a {
  color: #0288D9; font-size: 16px;
}
.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus {
  color: RGB(255,128,0);
}
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus {
  color: RGB(255,128,0); 
}


</style>

</head>
<body>

<div class="container col-lg-12" id="nav1">
	<nav class="navbar navbar-default" role="navigation">
		
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" id="">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="example-navbar-collapse">   
     <ul class="nav navbar-nav" style="padding-right: 100px;">        
        <div style="text-align:center"><img src="assests/images/logo.png" alt="" height="50px"></div> 
      </ul>  
      <ul class="nav navbar-nav navbar-center">        

      	<li><a href="index.php"><i class="glyphicon glyphicon-home"></i>  Accueil</a></li>        
        <li><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Produit </a></li> 
        <li><a href="client.php"><i class="glyphicon glyphicon-user"></i> Client</a></li>        

        <li><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Categorie</a></li> 

     	<li><a href="entreprise.php"><i class="glyphicon glyphicon-user"></i> Entreprise</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Devis <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Ajouter  Devis</a></li>            
            <li><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Liste des  devis</a></li>            
          </ul>
        </li> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Facture <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li><a href="facture.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Ajouter  Facture</a></li>            
            <li><a href="facture.php?o=manfact"> <i class="glyphicon glyphicon-edit"></i> Liste des factures</a></li>            
          </ul>
        </li>

        <li class="dropdown" >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Parametre</a></li> 
            <li><a href="setlogo.php"> <i class="glyphicon glyphicon-edit"></i> Changer le logo</a></li>            
            <li><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Deconnexion</a></li>            
          </ul>
        </li>        
               
      </ul>
    </div><!-- /.navbar-collapse -->
  <!-- /.container-fluid -->
	</nav>
  </div>

	<div class="container col-lg-12">