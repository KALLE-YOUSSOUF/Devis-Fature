var manageEntrepriseTable;

$(document).ready(function() {
	// top bar active
	$('#navEntreprise').addClass('active');
	
	// manage brand table
	manageEntrepriseTable = $("#manageEntrepriseTable").DataTable({
		'ajax': 'php_action/fetchEntreprise.php',
		'order': []		
	});

	// submit brand form function
	$("#submitEntrepriseForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var entrepriseName = $("#entrepriseName").val();
		var entrepriseAdresse = $("#entrepriseAdresse").val();
		var entrepriseTel = $("#entrepriseTel").val();
		var entreprisePays = $("#entreprisePays").val();
		var entrepriseEmail = $("#entrepriseEmail").val();
		var entrepriseSite = $("#entrepriseSite").val();

		if(entrepriseName == "") {
			$("#entrepriseName").after('<p class="text-danger">Nom de entreprise est obligatoire</p>');
			$('#entrepriseName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#entrepriseName").find('.text-danger').remove();
			// success out for form 
			$("#entrepriseName").closest('.form-group').addClass('has-success');	  	
		}
		
		if(entrepriseAdresse == "") {
			$("#entrepriseAdresse").after('<p class="text-danger"> Adresse de entreprise est obligatoire</p>');
			$('#entrepriseAdresse').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#entrepriseAdresse").find('.text-danger').remove();
			// success out for form 
			$("#entrepriseAdresse").closest('.form-group').addClass('has-success');	  	
		}
		
		if(entrepriseTel == "") {
			$("#entrepriseTel").after('<p class="text-danger">Téléphone de entreprise est obligatoire</p>');
			$('#entrepriseTel').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#entrepriseTel").find('.text-danger').remove();
			// success out for form 
			$("#entrepriseTel").closest('.form-group').addClass('has-success');	  	
		}
		
		if(entreprisePays == "") {
			$("#entreprisePays").after('<p class="text-danger">Pays de entreprise est obligatoire</p>');
			$('#entreprisePays').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#entreprisePays").find('.text-danger').remove();
			// success out for form 
			$("#entreprisePays").closest('.form-group').addClass('has-success');	  	
		}
		
		if(entrepriseEmail == "") {
			$("#entrepriseEmail").after('<p class="text-danger">Email de entreprise est obligatoire</p>');
			$('#entrepriseEmail').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#entrepriseEmail").find('.text-danger').remove();
			// success out for form 
			$("#entrepriseEmail").closest('.form-group').addClass('has-success');	  	
		}
		
		if(entrepriseSite == "") {
			$("#entrepriseSite").after('<p class="text-danger">Site web de entreprise est obligatoire</p>');
			$('#entrepriseSite').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#entrepriseSite").find('.text-danger').remove();
			// success out for form 
			$("#entrepriseSite").closest('.form-group').addClass('has-success');	  	
		}
		

		if(entrepriseName && entrepriseAdresse && entrepriseTel && entreprisePays && entrepriseEmail && entrepriseSite) {
			var form = $(this);
			// button loading
			$("#createEntrepriseBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createEntrepriseBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageEntrepriseTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitEntrepriseForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-entreprise-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit brand form function

});

function editEntreprise(entrepriseId = null) {
	if(entrepriseId) {
		// remove hidden brand id text
		$('#entrepriseId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-entreprise-result').addClass('div-hide');
		// modal footer
		$('.editEntrepriseFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedEntreprise.php',
			type: 'post',
			data: {entrepriseId : entrepriseId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-entreprise-result').removeClass('div-hide');
				// modal footer
				$('.editEntrepriseFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editEntrepriseName').val(response.entreprise_name);
				// setting the brand Adresse value 
				$('#editEntrepriseAdresse').val(response.entreprise_adresse);
				// setting the brand Tel value 
				$('#editEntrepriseTel').val(response.entreprise_tel);
				// setting the brand Pays value 
				$('#editEntreprisePays').val(response.entreprise_pays);
				// setting the brand Pays value 
				$('#editEntrepriseEmail').val(response.entreprise_email);
				// setting the brand Site value 
				$('#editEntrepriseSite').val(response.entreprise_site);
				// setting the brand status value
				// brand id 
				$(".editEntrepriseFooter").after('<input type="hidden" name="entrepriseId" id="entrepriseId" value="'+response.entreprise_id+'" />');

				// update brand form 
				$('#editEntrepriseForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var entrepriseName = $('#editEntrepriseName').val();
					var entrepriseAdresse = $('#editEntrepriseAdresse').val();
					var entrepriseTel = $('#editEntrepriseTel').val();
					var entreprisePays = $('#editEntreprisePays').val();
					var entrepriseEmail = $('#editEntrepriseEmail').val();
					var entrepriseSite = $('#editEntrepriseSite').val();
			

					if(entrepriseName == "") {
						$("#editEntrepriseName").after('<p class="text-danger">Nom de entreprise est obligatoire</p>');
						$('#editEntrepriseName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEntrepriseName").find('.text-danger').remove();
						// success out for form 
						$("#editEntrepriseName").closest('.form-group').addClass('has-success');	  	
					}
					
					if(entrepriseAdresse == "") {
						$("#editEntrepriseAdresse").after('<p class="text-danger">Adresse de entreprise est obligatoire</p>');
						$('#editEntrepriseAdresse').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEntrepriseAdresse").find('.text-danger').remove();
						// success out for form 
						$("#editEntrepriseAdresse").closest('.form-group').addClass('has-success');	  	
					}
					if(entrepriseTel == "") {
						$("#editEntrepriseTel").after('<p class="text-danger">Téléphone de entreprise est obligatoire</p>');
						$('#editEntrepriseTel').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEntrepriseTel").find('.text-danger').remove();
						// success out for form 
						$("#editEntrepriseTel").closest('.form-group').addClass('has-success');	  	
					}
					
					if(entreprisePays == "") {
						$("#editEntreprisePays").after('<p class="text-danger">Pays de entreprise est obligatoire</p>');
						$('#editEntreprisePays').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEntreprisePays").find('.text-danger').remove();
						// success out for form 
						$("#editEntreprisePays").closest('.form-group').addClass('has-success');	  	
					}
					
					if(entrepriseEmail == "") {
						$("#editEntrepriseEmail").after('<p class="text-danger">Email de entreprise est obligatoire</p>');
						$('#editEntrepriseEmail').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEntrepriseEmail").find('.text-danger').remove();
						// success out for form 
						$("#editEntrepriseEmail").closest('.form-group').addClass('has-success');	  	
					}
					
					if(entrepriseSite == "") {
						$("#editEntrepriseSite").after('<p class="text-danger">Site web de entreprise est obligatoire</p>');
						$('#editEntrepriseSite').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editEntrepriseSite").find('.text-danger').remove();
						// success out for form 
						$("#editEntrepriseSite").closest('.form-group').addClass('has-success');	  	
					}

					if(entrepriseName  && entrepriseAdresse && entrepriseTel && entreprisePays && entrepriseEmail && entrepriseSite) {
						var form = $(this);

						// submit btn
						$('#editEntrepriseBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editEntrepriseBtn').button('reset');

									// reload the manage member table 
									manageEntrepriseTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-entreprise-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function

function removeEntreprise(entrepriseId = null) {
	if(entrepriseId) {
		$('#removeEntrepriseId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedEntreprise.php',
			type: 'post',
			data: {entrepriseId : entrepriseId},
			dataType: 'json',
			success:function(response) {
				$('.removeEntrepriseFooter').after('<input type="hidden" name="removeEntrepriseId" id="removeEntrepriseId" value="'+response.entreprise_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeEntrepriseBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeEntrepriseBtn").button('loading');

					$.ajax({
						url: 'php_action/removeEntreprise.php',
						type: 'post',
						data: {entrepriseId : entrepriseId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeEntrepriseBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the brand table 
								manageEntrepriseTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removeEntrepriseFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function