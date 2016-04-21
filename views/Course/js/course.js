$(window).load (function (event) {
	$("button[name=cancel-add-edit]").click (function () {
		$("#add-edit-container").slideUp (300);		
	});

	$("#add-edit-form").submit (function (event) {
		var formData = new FormData ($(this) [0]);

		$.ajax ({
			type: "post",
			url: "Course/addOrUpdate",
        	data: formData,//$("#add-edit-form").serialize (),
        	encode: true,
        	contentType: false,
        	processData: false,

	        success: function (data) {
	            console.log ("Package sent");
	            $("#add-edit-form") [0].reset ();
	            var message = "";
	            window.location.href = "Course";
	            /*if (data != null && data.create) {
	            	message = "Registro creado";
	            	$("#add-edit-container").slideUp (300);
	            }
	            else if (data != null && data.update) message = "Registro actualizado";
	            else message = "Hubo un erro al guardar";

	            alert (message);*/
	        },

	        error: function (data) {
	            console.log ("Package unsent");
	            window.location.href = "Course";
	        }
		});

		event.preventDefault ();
	});

	$("#crud-table").click (function (event) {
		if (event.target.nodeName == "A") {
			var code = event.target.id;
			var option = code.charAt (0);
			var size = code.length;
			var identifier = "";

			for (var i = 1; i < size; i ++) {
				identifier = identifier.concat (code.charAt (i));
			}

			if (option == "m") {				
				$("#panel-label").text ("Editar curso");

				if (!$("#add-edit-container").is (":visible")) {					
					$("#add-edit-container").slideDown (300);

					if ($("#table-delete-buttons-" + identifier).is (":visible")) {
						$("#table-delete-buttons-" + identifier).fadeOut (1);	
					}					
				}
				else {
					$("#add-edit-container").slideUp (150, function () {
						$("#add-edit-container").slideDown (150);
					});
				}

				$("#identifier-label").val (identifier);
				$("#name").val ($("#nam" + identifier).text ());
				$("#description").val ($("#des" + identifier).text ());
			}
			else {				
				if ($("#table-delete-buttons-" + identifier).is (":visible")) {
					$("#table-delete-buttons-" + identifier).fadeOut (1);
				}						
				else {
					$("#table-delete-buttons-" + identifier).fadeIn (1);					
					
					if ($("#add-edit-container").is (":visible")) {
						$("#identifier-label").val (null);
						$("#name").val (null);
						$("#description").val (null);
						$("#add-edit-container").slideUp (300);
					}
				}
			}	
		}
		else if (event.target.nodeName == "BUTTON") {			
			var code = event.target.id;
			var option = code.charAt (0) + code.charAt (1);
			var size = code.length;
			var identifier = "";

			for (var i = 2; i < size; i ++)	{
				identifier = identifier.concat (code.charAt (i));
			}

			if (option == "cm") {
				$("#table-buttons-" + identifier).fadeOut (1);
			}
			else if (option == "cd") {
				$("#table-delete-buttons-" + identifier).fadeOut (1);
			}
			else if (option == "mb") {
				alert ("Guardar");
			}
			else if (option == "db") {
				var check = confirm ("¿Seguro que desea eliminar este registro?");

				if (check)
				{
					$.ajax ({
						type: "post",
				        url: "Course/delete",
				        data: {id: identifier},
				        encode: true,

				        success: function (data) {
				            console.log ("Package sent");
				            console.log (data);

				            if (data != null && data.delete) {
				            	alert ("Registro eliminado");
				            	window.location.href = "Course";
				            }
				            else {
				            	alert ("Se produjo un error al eliminar");
				            }
				        },

				        error: function (data) {
				            console.log ("Package unsent");
				            console.log (data);
				        }
					});
				}
			}
			else {
				$("#panel-label").text ("Agregar curso");
				$("#identifier-label").val (null);
				$("#name").val (null);
				$("#description").val (null);	
				if (!$("#add-edit-container").is (":visible")) $("#add-edit-container").slideDown (300);
				
				if ($(".table-button").is (":visible")) {
					$(".table-button").fadeOut (1);	
				}	
			}
		}

		event.preventDefault ();
	});
	
	$.ajax ({
    	type: "post",
        url: "User/retrieveSession",
        data: null,
        encode: true,

        success: function (data) {
            console.log ("Package sent");
            console.log (data);
            var message = "";

            if (data != null) {
            	$(".gravatar").attr("src", data.image);
            }
            else {
            	message = "Ese necesario iniciar sesión";
                alert (message);
               	window.location.href = "Index";
            }
        },

        error: function (data) {
            console.log ("Package unsent");
            console.log (data);
        }
    });

    $("#closeAccount").click (function () {
    	$.ajax ({
	    	type: "post",
	        url: "User/destroySession",
	        data: null,
	        encode: true,

	        success: function (data) {
	            console.log ("Package sent");
	            console.log (data);
	            var message = "";

	            if (data != null && data.session) {
	            	message = "Sesión finalizada";
	            	alert (message);
	               	window.location.href = "Index";
	            }
	            else {
	            	message = "Ocurrió un error al intentar cerrar sesión";    
	            	window.location.href = "Course";            
	            }
	        },

	        error: function (data) {
	            console.log ("Package unsent");
	            console.log (data);
	        }
        });
    });

	event.preventDefault ();
});