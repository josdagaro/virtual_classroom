$(document).ready (function () {
    $("#sign-in-form").submit (function (event) {
        $.ajax ({
            type: "post",
            url: "User/authenticate",
            data: $("#sign-in-form").serialize (),
            encode: true,

            success: function (data) {
                console.log ("Package sent");
                $("#sign-in-form") [0].reset ();
                var message = "";

                if (data != null) {
                    if (data.case == 2) {
                        message = "Autenticado\n";
                        message += "Cuenta activa";   
                        window.location.href = "Index";                     
                    }
                    else if (data.case == 1) {
                        message = "Autenticado\n";
                        message += "Cuenta no activa";
                    }
                    else {
                        message = "No autenticado";
                    }

                    console.log (data);
                    alert (message);
                    //Acción una vez conectado
                }
                else {
                    alert ("El correo electrónico y/o la contraseña son/es inválido(s)");
                }
            },

            error: function (data) {
                console.log ("Package unsent");
                console.log (data);
            }
        });

        event.preventDefault ();
    });

    $("#sign-up-form").submit (function (event) {
        $.ajax ({
            type: "post",
            url: "User/create",
            data: $("#sign-up-form").serialize (),
            encode: true,

            success: function (data) {
                console.log ("Package sent");
                $("#sign-up-form") [0].reset ();
                var message = "";                

                if (data != null) {
                    message = "Registrado con éxito\n";
                    message += "Se ha enviado un mensaje de activación a tu dirección de correo electrónico";
                    console.log (data);
                    alert (message);
                    $("#go-sign-in").click ();
                }
                else {
                    alert ("El correo electrónico especificado ya está registrado, o un/varios campo(s) requerido(s) se encuentra(n) vacío(s)");
                }
            },

            error: function (data) {
                console.log ("Package unsent");
                console.log (data);
            }
        });

        event.preventDefault ();
    });

    var signInValidator = $("#sign-in-form").bootstrapValidator ({
        fields: {
            signInEmail: {
                message: "Tu correo electrónico es requerido. ",

                validators: {
                    notEmpty: {
                        message: "Por favor, escribe tu correo electrónico. "
                    },

                    stringLength: {
                        min: 16,
                        max: 30,
                        message: "Tu correo electrónico deben contener entre 10 y 30 caracteres. "
                    },

                    regexp: {
                        regexp: /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/,
                        message: "Tu correo electrónico es incorrecto. "
                    }
                }
            },

            signInPassword: {
                message: "Tu contraseña es requerida. ",

                validators: {
                    notEmpty: {
                        message: "Por favor, ingresa una contraseña. "
                    },

                    stringLength: {
                        min: 6,
                        max: 12,
                        message: "Tu contraseña debe contener entre 6 y 12 caracteres. "
                    }
                }
            },
        }
    });

    signInValidator.on ("success.form.bv", function (event) {
        event.preventDefault ();
    });

    var signUpValidator = $("#sign-up-form").bootstrapValidator ({
        fields: {
            identifier: {
                message: "Tu número de identificación es requeridos. ",

                validators: {
                    notEmpty: {
                        message: "Por favor, digita tu número de identificación. "
                    },

                    stringLength: {
                        min: 10,
                        max: 15,
                        message: "Tu número de identificación debe contener entre 10 y 15 números. "
                    },

                    regexp:
                    {
                        regexp: /^[0-9]*$/,
                        message: 'Tu número de identificación debe consistir en números únicamente. '
                    }
                }
            },

            name: {
                message: "Tu(s) nombre(s) es/son requerido(s). ",

                validators: {
                    notEmpty: {
                        message: "Por favor, escribe tu(s) nombre(s). "
                    },

                    stringLength: {
                        min: 3,
                        max: 20,
                        message: "Tu(s) nombre(s) deben contener entre 3 y 20 caracteres. "
                    },

                    regexp: {
                        regexp: /^[A-Za-z ]*$/,
                        message: 'Tu(s) nombre(s) debe consistir en letras únicamente. '
                    }
                }
            },

            lastName: {
                message: "Tus apellidos son requeridos. ",

                validators: {
                    notEmpty: {
                        message: "Por favor, escribe tus apellidos. "
                    },

                    stringLength: {
                        min: 10,
                        max: 20,
                        message: "Tus apellidos deben contener entre 10 y 20 caracteres. "
                    },

                    regexp: {
                        regexp: /^[A-Za-z ]*$/,
                        message: 'Tus apellidos deben consistir en letras únicamente. '
                    }
                }
            },

            signUpEmail: {
                message: "Tu correo electrónico es requerido. ",

                validators: {
                    notEmpty: {
                        message: "Por favor, escribe tu correo electrónico. "
                    },

                    stringLength: {
                        min: 16,
                        max: 30,
                        message: "Tu correo electrónico deben contener entre 10 y 30 caracteres. "
                    },

                    regexp: {
                        regexp: /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/,
                        message: "Tu correo electrónico es incorrecto. "
                    }
                }
            },

            signUpPassword: {
                message: "Tu contraseña es requerida. ",

                validators: {
                    notEmpty: {
                        message: "Por favor, ingresa una contraseña. "
                    },

                    stringLength: {
                        min: 6,
                        max: 12,
                        message: "Tu contraseña debe contener entre 6 y 12 caracteres. "
                    }
                }
            },

            verifyPassword: {
                message: "Confirma tu contraseña. ",

                validators: {
                    notEmpty: {
                        message: "Debes verificar tu contraseña. "
                    },

                    identical: {
                        field: "signUpPassword",
                        message: "Las contraseñas deben ser iguales. "
                    }
                }
            }
        }
    });

    signUpValidator.on ("success.form.bv", function (event) {
        event.preventDefault ();
    });
});