<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Accueil</a></li>		  
		  <li class="active">Entreprise</li>
		</ol>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Gestion Entreprise</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-success button1" data-toggle="modal" data-target="#addEntrepriseModel"> <i class="glyphicon glyphicon-pl   us-sign"></i> Ajouter Entreprise </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageEntrepriseTable">
					<thead>
						<tr>							
							<th>Nom</th>
							<th>Adresse</th>
							<th>Téléphone</th>
							<th>Pays</th>
							<th>E-mail</th>
							<th>Site web</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<div class="modal fade" id="addEntrepriseModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="submitEntrepriseForm" action="php_action/createEntreprise.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Ajouter Entreprise</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="add-entreprise-messages"></div>

	        <div class="form-group">
	        	<label for="entrepriseName" class="col-sm-3 control-label">Nom: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="entrepriseName" placeholder=" Nom entreprise" name="entrepriseName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
	         <div class="form-group">
	        	<label for="entrepriseAdresse" class="col-sm-3 control-label"> Adresse: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="entrepriseAdresse" placeholder="Adresse entreprise" name="entrepriseAdresse" autocomplete="off">
				    </div>
	        </div> <!-- /form-group--> 
	        <div class="form-group">
	        	<label for="entrepriseTel" class="col-sm-3 control-label"> Téléphone: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="entrepriseTel" placeholder="Téléphone entreprise" name="entrepriseTel" autocomplete="off">
				    </div>
	        </div> <!-- /form-group--> 
	        <div class="form-group">
	        	<label for="entreprisePays" class="col-sm-3 control-label"> Pays: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="entreprisePays" placeholder="Pays entreprise" name="entreprisePays" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->  
	        <div class="form-group">
	        	<label for="entrepriseEmail" class="col-sm-3 control-label"> E-mail: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="entrepriseEmail" placeholder="Email entreprise" name="entrepriseEmail" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->  
	          <div class="form-group">
	        	<label for="entrepriseSite" class="col-sm-3 control-label"> Site web: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="entrepriseSite" placeholder="Site web entreprise" name="entrepriseSite" autocomplete="off">
				    </div>
	        </div> <!-- /form-group--> 	        
	                 	       
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
	        
	        <button type="submit" class="btn btn-primary" id="createEntrepriseBtn" data-loading-text="Loading..." autocomplete="off">Enregistrer les modifications</button>
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
<div class="modal fade" id="editEntrepriseModel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	
    	<form class="form-horizontal" id="editEntrepriseForm" action="php_action/editEntreprise.php" method="POST">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Modifier Entreprise</h4>
	      </div>
	      <div class="modal-body">

	      	<div id="edit-entreprise-messages"></div>

	      	<div class="modal-loading div-hide" style="width:50px; margin:auto;padding-top:50px; padding-bottom:50px;">
						<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Chargement...</span>
					</div>

		      <div class="edit-entreprise-result">
		      	<div class="form-group">
		        	<label for="editEntrepriseName" class="col-sm-3 control-label">Nom: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editEntrepriseName" placeholder="Nom" name="editEntrepriseName" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->
		        <div class="form-group">
		        	<label for="editEntrepriseAdresse" class="col-sm-3 control-label">Adresse: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editEntrepriseAdresse" placeholder="Entreprise Adresse" name="editEntrepriseAdresse" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
		        <div class="form-group">
		        	<label for="editEntrepriseTel" class="col-sm-3 control-label">Téléphone: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editEntrepriseTel" placeholder="Entreprise Téléphone" name="editEntrepriseTel" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
		        <div class="form-group">
		        	<label for="editEntreprisePays" class="col-sm-3 control-label">Pays: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editEntreprisePays" placeholder="Entreprise Pays" name="editEntreprisePays" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	 
		        <div class="form-group">
		        	<label for="editEntrepriseEmail" class="col-sm-3 control-label">E-mail: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="email" class="form-control" id="editEntrepriseEmail" placeholder="Entreprise Email" name="editEntrepriseEmail" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	
		        <div class="form-group">
		        	<label for="editEntrepriseSite" class="col-sm-3 control-label">Site web: </label>
		        	<label class="col-sm-1 control-label">: </label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="editEntrepriseSite" placeholder="Site web" name="editEntrepriseSite" autocomplete="off">
					    </div>
		        </div> <!-- /form-group-->	        	
		      </div>         	        
		      <!-- /edit brand result -->

	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer editEntrepriseFooter">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
	        
	        <button type="submit" class="btn btn-success" id="editEntrepriseBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer les modifications</button>
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
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Supprimer Entreprise</h4>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer ?</p>
      </div>
      <div class="modal-footer removeEntrepriseFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Fermer</button>
        <button type="button" class="btn btn-primary" id="removeEntrepriseBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Enregistrer les modifications</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /remove brands -->

<script src="custom/js/entreprise.js"></script>

<?php require_once 'includes/footer.php'; ?>