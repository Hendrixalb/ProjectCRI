// global the manage memeber table 
var manageMemberTable;

$(document).ready(function() {
	manageMemberTable = $("#manageMemberTable").DataTable({
		"ajax": "php_action/retrieve.php",
		"order": []
	});

	$("#addMemberModalBtn").on('click', function() {
		// reset the form 
		$("#createMemberForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createMemberForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var Carnet = $("#Carnet").val();
			var Nombres = $("#Nombres").val();
			var Apellidos = $("#Apellidos").val();
			var Sexo = $("#Sexo").val();
			var Cod_ca = $("#Cod_ca").val();
			var Trb_gra = $("#Trb_gra").val();
			var Fecha_egre = $("#Fecha_egre").val();
			var Fecha_grad = $("#Fecha_grad").val();
			var active = $("#active").val();

			if(Carnet == "") {
				$("#Carnet").closest('.form-group').addClass('has-error');
				$("#Carnet").after('<p class="text-danger">The Carnet field is required</p>');
			} else {
				$("#Carnet").closest('.form-group').removeClass('has-error');
				$("#Carnet").closest('.form-group').addClass('has-success');				
			}

			if(Nombres == "") {
				$("#Nombres").closest('.form-group').addClass('has-error');
				$("#Nombres").after('<p class="text-danger">The Nombres field is required</p>');
			} else {
				$("#Nombres").closest('.form-group').removeClass('has-error');
				$("#Nombres").closest('.form-group').addClass('has-success');				
			}

			if(Apellidos == "") {
				$("#Apellidos").closest('.form-group').addClass('has-error');
				$("#Apellidos").after('<p class="text-danger">The Apellidos field is required</p>');
			} else {
				$("#Apellidos").closest('.form-group').removeClass('has-error');
				$("#Apellidos").closest('.form-group').addClass('has-success');				
			}

			if(Sexo == "") {
				$("#Sexo").closest('.form-group').addClass('has-error');
				$("#Sexo").after('<p class="text-danger">The Sexo field is required</p>');
			} else {
				$("#Sexo").closest('.form-group').removeClass('has-error');
				$("#Sexo").closest('.form-group').addClass('has-success');				
			}

			if(Cod_ca == "") {
				$("#Cod_ca").closest('.form-group').addClass('has-error');
				$("#Cod_ca").after('<p class="text-danger">The Codigo field is required</p>');
			} else {
				$("#Cod_ca").closest('.form-group').removeClass('has-error');
				$("#Cod_ca").closest('.form-group').addClass('has-success');				
			}

			if(Trb_gra == "") {
				$("#Trb_gra").closest('.form-group').addClass('has-error');
				$("#Trb_gra").after('<p class="text-danger">The Trabajo de graduacion field is required</p>');
			} else {
				$("#Trb_gra").closest('.form-group').removeClass('has-error');
				$("#Trb_gra").closest('.form-group').addClass('has-success');				
			}

			if(Fecha_egre == "") {
				$("#Fecha_egre").closest('.form-group').addClass('has-error');
				$("#Fecha_egre").after('<p class="text-danger">The Fecha de egreso field is required</p>');
			} else {
				$("#Fecha_egre").closest('.form-group').removeClass('has-error');
				$("#Fecha_egre").closest('.form-group').addClass('has-success');				
			}

			if(Fecha_grad == "") {
				$("#Fecha_grad").closest('.form-group').addClass('has-error');
				$("#Fecha_grad").after('<p class="text-danger">The Fecha de graduacion field is required</p>');
			} else {
				$("#Fecha_grad").closest('.form-group').removeClass('has-error');
				$("#Fecha_grad").closest('.form-group').addClass('has-success');				
			}

			if(active == "") {
				$("#active").closest('.form-group').addClass('has-error');
				$("#active").after('<p class="text-danger">The active field is required</p>');
			} else {
				$("#active").closest('.form-group').removeClass('has-error');
				$("#active").closest('.form-group').addClass('has-success');				
			}

			if(Carnet && Nombres && Apellidos && Sexo && Cod_ca && Trb_gra && Fecha_egre && Fecha_grad && active) {
				//submi the form to server
				$.ajax({
					url : form.attr('action'),
					type : form.attr('method'),
					data : form.serialize(),
					dataType : 'json',
					success:function(response) {

						// remove the error 
						$(".form-group").removeClass('has-error').removeClass('has-success');

						if(response.success == true) {
							$(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

							// reset the form
							$("#createMemberForm")[0].reset();		

							// reload the datatables
							manageMemberTable.ajax.reload(null, false);
							// this function is built in function of datatables;

						} else {
							$(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
						}  // /else
					} // success  
				}); // ajax subit 				
			} /// if


			return false;
		}); // /submit form for create member
	}); // /add modal

});

function removeMember(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/remove.php',
				type: 'post',
				data: {member_id : id},
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {						
						$(".removeMessages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
							'</div>');

						// refresh the table
						manageMemberTable.ajax.reload(null, false);

						// close the modal
						$("#removeMemberModal").modal('hide');

					} else {
						$(".removeMessages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
							  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
							  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
							'</div>');
					}
				}
			});
		}); // click remove btn
	} else {
		alert('Error: Refresh the page again 1');
	}
}

function editMember(id = null) {
	if(id) {

		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".edit-messages").html("");

		// remove the id
		$("#member_id").remove();

		// fetch the member data
		$.ajax({
			url: 'php_action/getSelectedMember.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#Carnet").val(response.Carnet);

				$("#Nombres").val(response.Nombres);

				$("#Apellidos").val(response.Apellidos);

				$("#Sexo").val(response.Sexo);

				$("#Cod_ca").val(response.Cod_ca);

				$("#Trb_gra").val(response.Trb_gra);

				$("#Fecha_egre").val(response.Fecha_egre);

				$("#Fecha_grad").val(response.Fecha_grad);

				$("#active").val(response.active);	

				// mmeber id 
				$(".editMemberModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateMemberForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var Carnet = $("#Carnet").val();
					var Nombres = $("#Nombres").val();
					var Apellidos = $("#Apellidos").val();
					var Sexo = $("#Sexo").val();
					var Cod_ca = $("#Cod_ca").val();
					var Trb_gra = $("#Trb_gra").val();
					var Fecha_egre = $("#Fecha_egre").val();
					var Fecha_grad = $("#Fecha_grad").val();
					var active = $("#active").val();

					if(Carnet == "") {
						$("#Carnet").closest('.form-group').addClass('has-error');
						$("#Carnet").after('<p class="text-danger">The Name field is required</p>');
					} else {
						$("#Carnet").closest('.form-group').removeClass('has-error');
						$("#Carnet").closest('.form-group').addClass('has-success');				
					}

					if(Nombres == "") {
						$("#Nombres").closest('.form-group').addClass('has-error');
						$("#Nombres").after('<p class="text-danger">The Address field is required</p>');
					} else {
						$("#Nombres").closest('.form-group').removeClass('has-error');
						$("#Nombres").closest('.form-group').addClass('has-success');				
					}

					if(Apellidos == "") {
						$("#Apellidos").closest('.form-group').addClass('has-error');
						$("#Apellidos").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Apellidos").closest('.form-group').removeClass('has-error');
						$("#Apellidos").closest('.form-group').addClass('has-success');				
					}

					if(Sexo == "") {
						$("#Sexo").closest('.form-group').addClass('has-error');
						$("#Sexo").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Sexo").closest('.form-group').removeClass('has-error');
						$("#Sexo").closest('.form-group').addClass('has-success');				
					}

					if(Cod_ca == "") {
						$("#Cod_ca").closest('.form-group').addClass('has-error');
						$("#Cod_ca").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Cod_ca").closest('.form-group').removeClass('has-error');
						$("#Cod_ca").closest('.form-group').addClass('has-success');				
					}

					if(Trb_gra == "") {
						$("#Trb_gra").closest('.form-group').addClass('has-error');
						$("#Trb_gra").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Trb_gra").closest('.form-group').removeClass('has-error');
						$("#Trb_gra").closest('.form-group').addClass('has-success');				
					}

					if(Fecha_egre == "") {
						$("#Fecha_egre").closest('.form-group').addClass('has-error');
						$("#Fecha_egre").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Fecha_egre").closest('.form-group').removeClass('has-error');
						$("#Fecha_egre").closest('.form-group').addClass('has-success');				
					}

					if(Fecha_grad == "") {
						$("#Fecha_grad").closest('.form-group').addClass('has-error');
						$("#Fecha_grad").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Fecha_grad").closest('.form-group').removeClass('has-error');
						$("#Fecha_grad").closest('.form-group').addClass('has-success');				
					}

					if(active == "") {
						$("#active").closest('.form-group').addClass('has-error');
						$("#active").after('<p class="text-danger">The Active field is required</p>');
					} else {
						$("#active").closest('.form-group').removeClass('has-error');
						$("#active").closest('.form-group').addClass('has-success');				
					}

					if(Carnet && Nombres && Apellidos && Sexo && Cod_ca && Trb_gra && Fecha_egre && Fecha_grad && active) {
						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								if(response.success == true) {
									$(".edit-messages").html('<div class="alert alert-success alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>'+response.messages+
									'</div>');

									// reload the datatables
									manageMemberTable.ajax.reload(null, false);
									// this function is built in function of datatables;

									// remove the error 
									$(".form-group").removeClass('has-success').removeClass('has-error');
									$(".text-danger").remove();
								} else {
									$(".edit-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">'+
									  '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
									  '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>'+response.messages+
									'</div>')
								}
							} // /success
						}); // /ajax
					} // /if

					return false;
				});

			} // /success
		}); // /fetch selected member info

	} else {
		alert("Error : Refresh the page again 2");
	}
}