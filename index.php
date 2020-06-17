<?php 
require_once 'php_action/db_connect.php';

session_start();

if(isset($_SESSION['userId'])) {
	header('location: dashboard.php');	
}

$errors = array();

if($_POST) {		

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		} 

		if($password == "") {
			$errors[] = "Password is required";
		}
	} else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			$password = md5($password);
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$user_id = $value['user_id'];

				// set session
				$_SESSION['userId'] = $user_id;

				header('location: dashboard.php');	
			} else{
				
				$errors[] = "Combinaison incorrecte de l'utilisateur et de mot de passe";
			} // /else
		} else {		
			$errors[] = "Le nom de l'utilisateur n'existe pas";		
		} // /else
	} // /else not empty username // password
	
} // /if $_POST
?>

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

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
        <div class="row vertical" style="padding-top: 50px;">          
                <div class="col-md-4 col-md-offset-4">
                <img src="novatech.jpeg" width="250" size=300 class="img-responsive"> 
                <br>          
                <div class="messages">
							<?php if($errors) {
								foreach ($errors as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
						</div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="off" id="loginForm">
            	<fieldset>
                <div class="panel panel-primary">
                    <div class="panel-heading">Veuillez se connecter</div>
                    <div class="panel-body">
                    	<label for="username" class=" control-label">Nom de l'utilisateur</label>
                        <div class="input-group">
                        
                            <span class="input-group-addon">
                            	<span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" id="username" for="username" name="username" class="form-control" placeholder="Entrer le nom de l'utilisateur" required>
                        </div><br>
                        <label for="password" class=" control-label">Mot de passe</label>
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" id="password" for="password" name="password" class="form-control" placeholder="Entrer le mot de passe" required>
                        </div>
                        <br>
                  </div>
                </div>
            </fieldset>
                <button type='submit' class="btn btn-primary btn-block" value="Connexion"><span class="glyphicon glyphicon-log-in"></span>&nbsp; Connexion</button>
                </form>
            </div>
        
            </div>
        </div>
	<!-- container -->	
</body>
</html>







	