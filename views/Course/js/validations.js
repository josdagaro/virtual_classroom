$(document).ready (function () {
	var validator = $("#add-edit-form").bootstrapValidator ({
        fields: {
            name: {
				message: "Por favor, escribe el nombre del curso. ",

                validators: {                	
                    notEmpty: {
                    	message: "Por favor, escribe el nombre del curso. "
                    },

                    stringLength: {
                        min: 8,
                        max: 25,
                        message: "El nombre del curso debe contener entre 8 y 25 caracteres. "
                    },

                    regexp: {
                        regexp: /^[A-Za-z ]*$/,
                        message: "El nombre del curso solo debe contener letras. "
                    }
                }
            },

            description: {
                message: "Descripción requerida. ",

                validators: {
                    notEmpty: {
                        message: "Por favor, escribe una breve descripción del curso. "
                    },

                    stringLength: {
                        min: 10,
                        message: "La descripción debe contener mínimo 10 letras. "
                    }
                }
            },
        }
    });
});