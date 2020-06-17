var manageClientTable;

$(document).ready(function() {
	// top bar active
	$('#navClient').addClass('active');
	
	// manage brand table
	manageClientTable = $("#manageClientTable").DataTable({
		'ajax': 'php_action/fetchClient.php',
		'order': []		
	});

	// submit brand form function
	$("#submitClientForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var clientName = $("#clientName").val();
		var clientPrenom = $("#clientPrenom").val();
		var clientAdresse = $("#clientAdresse").val();
		var clientTel = $("#clientTel").val();
		var clientPays = $("#clientPays").val();
		var clientEmail = $("#clientEmail").val();
		var clientStatus = $("#clientStatus").val();

		if(clientName == "") {
			$("#clientName").after('<p class="text-danger">Nom de client est obligatoire</p>');
			$('#clientName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#clientName").find('.text-danger').remove();
			// success out for form 
			$("#clientName").closest('.form-group').addClass('has-success');	  	
		}
		
		if(clientPrenom == "") {
			$("#clientPrenom").after('<p class="text-danger">Prenom de client est obligatoire</p>');
			$('#clientPrenom').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#clientPrenom").find('.text-danger').remove();
			// success out for form 
			$("#clientPrenom").closest('.form-group').addClass('has-success');	  	
		}
		
		if(clientAdresse == "") {
			$("#clientAdresse").after('<p class="text-danger">Adresse de client est obligatoire</p>');
			$('#clientAdresse').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#clientAdresse").find('.text-danger').remove();
			// success out for form 
			$("#clientAdresse").closest('.form-group').addClass('has-success');	  	
		}
		
		if(clientTel == "") {
			$("#clientTel").after('<p class="text-danger">Téléphone de client est obligatoire</p>');
			$('#clientTel').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#clientTel").find('.text-danger').remove();
			// success out for form 
			$("#clientTel").closest('.form-group').addClass('has-success');	  	
		}
		
		if(clientPays == "") {
			$("#clientPays").after('<p class="text-danger">Pays de client est obligatoire</p>');
			$('#clientPays').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#clientPays").find('.text-danger').remove();
			// success out for form 
			$("#clientPays").closest('.form-group').addClass('has-success');	  	
		}
		
		if(clientEmail == "") {
			$("#clientEmail").after('<p class="text-danger">Email de client est obligatoire</p>');
			$('#clientEmail').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#clientEmail").find('.text-danger').remove();
			// success out for form 
			$("#clientEmail").closest('.form-group').addClass('has-success');	  	
		}
		
		if(clientStatus == "") {
			$("#clientStatus").after('<p class="text-danger">Genre de client est obligatoire</p>');

			$('#clientStatus').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#clientStatus").find('.text-danger').remove();
			// success out for form 
			$("#clientStatus").closest('.form-group').addClass('has-success');	  	
		}

		if(clientName && clientPrenom && clientAdresse && clientTel && clientPays && clientEmail && clientStatus) {
			var form = $(this);
			// button loading
			$("#createClientBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createClientBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageClientTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitClientForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-client-messages').html('<div class="alert alert-success">'+
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

function editClient(clientId = null) {
	if(clientId) {
		// remove hidden brand id text
		$('#clientId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-client-result').addClass('div-hide');
		// modal footer
		$('.editClientFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedClient.php',
			type: 'post',
			data: {clientId : clientId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-client-result').removeClass('div-hide');
				// modal footer
				$('.editClientFooter').removeClass('div-hide');

				// setting the brand name value 
				$('#editClientName').val(response.client_name);
				// setting the brand prenom value 
				$('#editClientPrenom').val(response.client_prenom);
				// setting the brand Adresse value 
				$('#editClientAdresse').val(response.client_adresse);
				// setting the brand Tel value 
				$('#editClientTel').val(response.client_tel);
				// setting the brand Pays value 
				$('#editClientPays').val(response.client_pays);
				// setting the brand Pays value 
				$('#editClientEmail').val(response.client_email);
				// setting the brand status value
				$('#editClientStatus').val(response.client_active);
				// brand id 
				$(".editClientFooter").after('<input type="hidden" name="clientId" id="clientId" value="'+response.client_id+'" />');

				// update brand form 
				$('#editClientForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var clientName = $('#editClientName').val();
					var clientPrenom = $('#editClientPrenom').val();
					var clientAdresse = $('#editClientAdresse').val();
					var clientTel = $('#editClientTel').val();
					var clientPays = $('#editClientPays').val();
					var clientEmail = $('#editClientEmail').val();
					var clientStatus = $('#editClientStatus').val();

					if(clientName == "") {
						$("#editClientName").after('<p class="text-danger">Nom de client est obligatoire</p>');
						$('#editClientName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editClientName").find('.text-danger').remove();
						// success out for form 
						$("#editClientName").closest('.form-group').addClass('has-success');	  	
					}
					
					if(clientPrenom == "") {
						$("#editClientPrenom").after('<p class="text-danger">Prenom de client est obligatoire</p>');
						$('#editClientPrenom').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editClientPrenom").find('.text-danger').remove();
						// success out for form 
						$("#editClientPrenom").closest('.form-group').addClass('has-success');	  	
					}
					
					if(clientAdresse == "") {
						$("#editClientAdresse").after('<p class="text-danger">Adresse de client est obligatoire</p>');
						$('#editClientAdresse').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editClientAdresse").find('.text-danger').remove();
						// success out for form 
						$("#editClientAdresse").closest('.form-group').addClass('has-success');	  	
					}
					if(clientTel == "") {
						$("#editClientTel").after('<p class="text-danger">Téléphone de client est obligatoire</p>');
						$('#editClientTel').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editClientTel").find('.text-danger').remove();
						// success out for form 
						$("#editClientTel").closest('.form-group').addClass('has-success');	  	
					}
					
					if(clientPays == "") {
						$("#editClientPays").after('<p class="text-danger">Pays de client est obligatoire</p>');
						$('#editClientPays').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editClientPays").find('.text-danger').remove();
						// success out for form 
						$("#editClientPays").closest('.form-group').addClass('has-success');	  	
					}
					
					if(clientEmail == "") {
						$("#editClientEmail").after('<p class="text-danger">Email de client est obligatoire</p>');
						$('#editClientEmail').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editClientEmail").find('.text-danger').remove();
						// success out for form 
						$("#editClientEmail").closest('.form-group').addClass('has-success');	  	
					}
					
					if(clientStatus == "") {
						$("#editClientStatus").after('<p class="text-danger">Genre de client est obligatoire</p>');

						$('#editClientStatus').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editClientStatus").find('.text-danger').remove();
						// success out for form 
						$("#editClientStatus").closest('.form-group').addClass('has-success');	  	
					}

					if(clientName && clientPrenom && clientAdresse && clientTel && clientPays && clientEmail && clientStatus) {
						var form = $(this);

						// submit btn
						$('#editClientBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editClientBtn').button('reset');

									// reload the manage member table 
									manageClientTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-client-messages').html('<div class="alert alert-success">'+
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

function removeClient(clientId = null) {
	if(clientId) {
		$('#removeClientId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedClient.php',
			type: 'post',
			data: {clientId : clientId},
			dataType: 'json',
			success:function(response) {
				$('.removeClientFooter').after('<input type="hidden" name="removeClientId" id="removeClientId" value="'+response.client_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeClientBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeClientBtn").button('loading');

					$.ajax({
						url: 'php_action/removeClient.php',
						type: 'post',
						data: {clientId : clientId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeClientBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the brand table 
								manageClientTable.ajax.reload(null, false);
								
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

		$('.removeClientFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function