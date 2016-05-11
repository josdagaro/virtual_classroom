$(window).load (function (event) {
	$.ajax ({
    	type: "post", url: "User/retrieveSession", data: null, encode: true,

        success: function (data) {
            console.log ("Package sent");
            console.log (data);
            var message = "",
            node = null;

            if (data != null) {
            	$(".gravatar").attr("src", data.image);
            	$("#user-name").text (data.name + " " + data.lastName);
            	if (data.type == 0) $("#current-role").text ("Rol actual: Administrador");
            	else if (data.type == 1) $("#current-role").text ("Rol actual: Docente");
            	else if (data.type == 2) $("#current-role").text ("Rol actual: Estudiante");
                $("#user-email").text ("Correo electrónico: " + data.email);
                $("#user-id").text ("Número de identificación: " + data.identificationNumber);
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
	    	type: "post", url: "User/destroySession", data: null, encode: true,

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

    $("#btn-sel").click (function () {
        var dataset = {"selected-role": $("#rol-sel").val (), "type": 0};

        $.ajax ({
            type: "post", url: "Request/send", data: dataset, encode: true,

            success: function (data) {
                console.log ("Package sent");
                console.log (data);
                $("#user-rol") [0].reset ();
                var message = "";

                if (data != null) {
                    if (data.create) message = "Solicitud enviada";
                    else message = "Ya existe una petición";
                }
                else message = "Ocurrió un error al generar la solicitud";  
                alert (message);   
            },

            error: function (data) {
                console.log ("Package unsent");
                console.log (data);
            }
        });
    });

	event.preventDefault ();	
});