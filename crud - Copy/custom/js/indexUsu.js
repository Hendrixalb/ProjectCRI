// global the manage memeber table 
var manageUsuTable;

$(document).ready(function() {
	manageUsuTable = $("#manageUsuTable").DataTable({
			
		 "processing": true,
         "sAjaxSource":"php_action/retrieveUsu.php",
		 "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                buttons: [
                    'copy',
                    'excel',
                   
                    'pdf',
                    'print'
                ]
            }
        ]
	});

	$("#addUsuModalBtn").on('click', function() {
		// reset the form 
		$("#createUsuForm")[0].reset();
		// remove the error 
		$(".form-group").removeClass('has-error').removeClass('has-success');
		$(".text-danger").remove();
		// empty the message div
		$(".messages").html("");

		// submit form
		$("#createUsuForm").unbind('submit').bind('submit', function() {

			$(".text-danger").remove();

			var form = $(this);

			// validation
			var user = $("#user").val();
			var email = $("#email").val();
			var password = $("#password").val();
			var pasadmin = $("#pasadmin").val();
			var rol = $("#rol").val();

			var active = $("#active").val();

			if(user == "") {
				$("#user").closest('.form-group').addClass('has-error');
				$("#user").after('<p class="text-danger">The Name field is required</p>');
			} else {
				$("#user").closest('.form-group').removeClass('has-error');
				$("#user").closest('.form-group').addClass('has-success');				
			}

			if(email == "") {
				$("#email").closest('.form-group').addClass('has-error');
				$("#email").after('<p class="text-danger">The Address field is required</p>');
			} else {
				$("#email").closest('.form-group').removeClass('has-error');
				$("#email").closest('.form-group').addClass('has-success');				
			}

			if(password == "") {
				$("#password").closest('.form-group').addClass('has-error');
				$("#password").after('<p class="text-danger">The Name field is required</p>');
			} else {
				$("#password").closest('.form-group').removeClass('has-error');
				$("#password").closest('.form-group').addClass('has-success');				
			}

			if(pasadmin == "") {
				$("#pasadmin").closest('.form-group').addClass('has-error');
				$("#pasadmin").after('<p class="text-danger">The Address field is required</p>');
			} else {
				$("#pasadmin").closest('.form-group').removeClass('has-error');
				$("#pasadmin").closest('.form-group').addClass('has-success');				
			}

			if(rol == "") {
				$("#rol").closest('.form-group').addClass('has-error');
				$("#rol").after('<p class="text-danger">The Name field is required</p>');
			} else {
				$("#rol").closest('.form-group').removeClass('has-error');
				$("#rol").closest('.form-group').addClass('has-success');				
			}

			

			if(active == "") {
				$("#active").closest('.form-group').addClass('has-error');
				$("#active").after('<p class="text-danger">The Active field is required</p>');
			} else {
				$("#active").closest('.form-group').removeClass('has-error');
				$("#active").closest('.form-group').addClass('has-success');				
			}

			if(user && email && password && pasadmin && rol && active) {
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
							$("#createUsuForm")[0].reset();		

							// reload the datatables
							manageUsuTable.ajax.reload(null, false);
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

function removeUsu(id = null) {
	if(id) {
		// click on remove button
		$("#removeBtn").unbind('click').bind('click', function() {
			$.ajax({
				url: 'php_action/removeUsu.php',
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
						manageUsuTable.ajax.reload(null, false);

						// close the modal
						$("#removeUsuModal").modal('hide');

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

function editUsu(id = null) {
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
			url: 'php_action/getSelectedUsu.php',
			type: 'post',
			data: {member_id : id},
			dataType: 'json',
			success:function(response) {
				$("#Edituser").val(response.user);

				$("#Editemail").val(response.email);

				$("#Editpassword").val(response.password);

				$("#Editpasadmin").val(response.pasadmin);

				$("#Editrol").val(response.rol);

				$("#Editactive").val(response.active);	

				// mmeber id 
				$(".editUsuModal").append('<input type="hidden" name="member_id" id="member_id" value="'+response.id+'"/>');

				// here update the member data
				$("#updateUsuForm").unbind('submit').bind('submit', function() {
					// remove error messages
					$(".text-danger").remove();

					var form = $(this);

					// validation
					var Edituser = $("#Edituser").val();
					var Editemail = $("#Editemail").val();
					var Editpassword = $("#Editpassword").val();
					var Editpasadmin = $("#Editpasadmin").val();
					var Editrol = $("#Editrol").val();
					
					var Editactive = $("#Editactive").val();

					if(Edituser == "") {
						$("#Edituser").closest('.form-group').addClass('has-error');
						$("#Edituser").after('<p class="text-danger">The Name field is required</p>');
					} else {
						$("#Edituser").closest('.form-group').removeClass('has-error');
						$("#Edituser").closest('.form-group').addClass('has-success');				
					}

					if(Editemail == "") {
						$("#Editemail").closest('.form-group').addClass('has-error');
						$("#Editemail").after('<p class="text-danger">The Address field is required</p>');
					} else {
						$("#Editemail").closest('.form-group').removeClass('has-error');
						$("#Editemail").closest('.form-group').addClass('has-success');				
					}

					if(Editpassword == "") {
						$("#password").closest('.form-group').addClass('has-error');
						$("#password").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#password").closest('.form-group').removeClass('has-error');
						$("#password").closest('.form-group').addClass('has-success');				
					}

					if(Editpasadmin == "") {
						$("#Editpasadmin").closest('.form-group').addClass('has-error');
						$("#Editpasadmin").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Editpasadmin").closest('.form-group').removeClass('has-error');
						$("#Editpasadmin").closest('.form-group').addClass('has-success');				
					}

					if(Editrol == "") {
						$("#Editrol").closest('.form-group').addClass('has-error');
						$("#Editrol").after('<p class="text-danger">The Contact field is required</p>');
					} else {
						$("#Editrol").closest('.form-group').removeClass('has-error');
						$("#Editrol").closest('.form-group').addClass('has-success');				
					}

					
					if(Editactive == "") {
						$("#Editactive").closest('.form-group').addClass('has-error');
						$("#Editactive").after('<p class="text-danger">The Editactive field is required</p>');
					} else {
						$("#Editactive").closest('.form-group').removeClass('has-error');
						$("#Editactive").closest('.form-group').addClass('has-success');				
					}

					if(Edituser && Editemail && Editpassword && Editpasadmin && Editrol && Editactive) {
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
									manageUsuTable.ajax.reload(null, false);
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