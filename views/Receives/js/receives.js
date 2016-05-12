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
                notificationsQuantity ();          	
                setInterval (notificationsQuantity, 1000);
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

    $("#req-container").click (function (event) {
        if (event.target.nodeName == "BUTTON") {
            var code = event.target.id, option = code.charAt (0), size = code.length,
                identifier = "", dataset = null;
            for (var i = 1; i < size; i ++) identifier = identifier.concat (code.charAt (i));
            if (option == "a") option = 1;
            else option = 0;
            dataset = {id: identifier, action: option};
            
            $.ajax ({
                type: "post", url: "Request/attend", data: dataset, encode: true,
                
                success: function (data) {
                    console.log ("Package sent");
                    console.log (data);
                    var message = "";
                    if (data != null) message = "Haz " + data.message + " la solicitud";
                    else message = "La solicitud señalada no es válida o no existe";
                    alert (message);
                    window.location.href = "Receives";
                },

                error: function (data) {
                    console.log ("Package unsent");
                    console.log (data);                                      
                }
            });
        }
    });

	event.preventDefault ();	
});

function notificationsQuantity () {
    $.ajax ({
        type: "post", url: "User/requestsNumber", data: null, encode: true,

        success: function (data) {
            /*console.log ("Package sent");
            console.log (data);*/
            var message = "";

            if (data != null) $(".badge").text (data.notificationsQuantity);
            else {
                message = "La sesión fue cerrada";    
                alert (message);
                window.location.href = "User";            
            }
        },

        error: function (data) {
            console.log ("Package unsent");
            console.log (data);
        }
    });
}