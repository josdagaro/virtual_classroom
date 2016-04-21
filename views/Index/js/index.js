$(window).load (function (event) {
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