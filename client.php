<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>		  
		  <li class="active">Client</li>
		</ol>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gestion de clients</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-success button1" data-toggle="modal" data-target="#addClientModel"> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter client </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageClientTable">
					<thead>
						<tr>							
							<th>Nom</th>
							<th>Prenom</th>
							<th>Adresse</th>
							<th>Téléphone</th>
							<th>Pays</th>
							<th>E-mail</th>
							<th>Genre</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addClientModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitClientForm" action="php_action/createClient.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter client</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-client-messages"></div>

	        <div class="form-group">
	        	<label for="clientName" class="col-sm-3 control-label">Nom: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="clientName" placeholder="Client Name" name="clientName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
	        <div class="form-group">
	        	<label for="clientPrenom" class="col-sm-3 control-label"> Prenom: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="clientPrenom" placeholder="Client Prenom" name="clientPrenom" autocomplete="off">
				    </div>
	        </div> <!-- /form-group--> 
	         <div class="form-group">
	        	<label for="clientAdresse" class="col-sm-3 control-label"> Adresse: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="clientAdresse" placeholder="Client Adresse" name="clientAdresse" autocomplete="off">
				    </div>
	        </div> <!-- /form-group--> 
	        <div class="form-group">
	        	<label for="clientTel" class="col-sm-3 control-label"> Téléphone: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="clientTel" placeholder="Client Téléphone" name="clientTel" autocomplete="off">
				    </div>
	        </div> <!-- /form-group--> 
	        <div class="form-group">
	        	<label for="clientPays" class="col-sm-3 control-label"> Pays: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="clientPays" placeholder="Client Pays" name="clientPays" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->  
	        <div class="form-group">
	        	<label for="clientEmail" class="col-sm-3 control-label"> E-mail: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="clientEmail" placeholder="Client Email" name="clientEmail" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->     	        
	        <div class="form-group">
	        	<label for="clientStatus" class="col-sm-3 control-label">Genre: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="clientStatus" name="clientStatus">
				      	<option value="">~~SELECTINNER~~</option>
				      	<option value="1">Masculin</option>
				      	<option value="2">Feminin</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
	        
	        <button type="submit" class="btn btn-primary" id="createClientBtn" data-loading-text="Loading..." autocomplete="off">Enregistrer les modifications</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->

<!-- edit brand -->
<div class="modal fade" id="editClientModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editClientForm" action="php_action/editClient.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Modifier un client</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-client-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Chargement...</span>
					</div>

		      <div class="edit-client-result">
		      	<div class="form-group">
		        	<label for="editClientName" class="col-sm-3 control-label">Nom : </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editClientName" placeholder="Client Name" name="editClientName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->
		        <div class="form-group">
		        	<label for="editClientPrenom" class="col-sm-3 control-label">Prenom: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editClientPrenom" placeholder="Client Prenom" name="editClientPrenom" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
		        <div class="form-group">
		        	<label for="editClientAdresse" class="col-sm-3 control-label">Adresse: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editClientAdresse" placeholder="Client Adresse" name="editClientAdresse" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
		        <div class="form-group">
		        	<label for="editClientTel" class="col-sm-3 control-label">Téléphone: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editClientTel" placeholder="Client Téléphone" name="editClientTel" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
		        <div class="form-group">
		        	<label for="editClientPays" class="col-sm-3 control-label">Pays: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editClientPays" placeholder="Client Pays" name="editClientPays" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	 
		        <div class="form-group">
		        	<label for="editClientEmail" class="col-sm-3 control-label">E-mail: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="editClientEmail" placeholder="Client Email" name="editClientEmail" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	        	        
		        <div class="form-group">
		        	<label for="editClientStatus" class="col-sm-3 control-label">Genre: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <select class="form-control" id="editClientStatus" name="editClientStatus">
					      	<option value="">~~SELECTIONNER~~</option>
					      	<option value="1">Masculin</option>
				      	    <option value="2">Feminin</option>
					      </select>
					    </div>
		        </div> <!-- /form-group-->	
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editClientFooter">
	        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
	        
	        <button type="submit" class="btn btn-success" id="editClientBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer les modifitions</button>
	      </div>
	      <!-- /modal-footer -->
     	</form>
	     <!-- /.form -->
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- / add modal -->
<!-- /edit brand -->

<!-- remove brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer client</h4>
      </div>
      <div class="modal-body">
        <p> Voulez-vous vraiment supprimer ?</p>
      </div>
      <div class="modal-footer removeClientFooter">
        <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i>Fermer</button>
        <button type="button" class="btn btn-primary" id="removeClientBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer les modifications</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brands -->

<script src="custom/js/client.js"></script>

<?php require_once 'includes/footer.php'; ?>