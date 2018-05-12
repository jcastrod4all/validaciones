// Validar usuarios existente con Vue

var app = new Vue({
    el: '#app',
    data: {
        usuario: '',
        password:'',
        email:'',
        labelUsuario:'',
        labelEmail:'',
        existente: false
    },
    methods: {

        revisarUsuario : function (evt) {
            
            var datos = new FormData();
            datos.append("validarUsuario", this.usuario);
            // Send a POST request
            axios({
                method: 'post',
                url: 'views/modules/ajax.php',
                data: datos
            }).then(function(respuesta) {
                if (respuesta.data == 0) {
                    app.$data.labelUsuario = "Este usuario ya existe en la base de datos";
                    app.$data.existente = false;
                }

                else {
                    app.$data.labelUsuario = "es un nuevo usuario";
                    app.$data.existente = true;
                }
            });


        },

        revisarEmail : function (evt) {
            
            var datos = new FormData();
            datos.append("validarEmail", this.email);
            // Send a POST request
            axios({
                method: 'post',
                url: 'views/modules/ajax.php',
                data: datos
            }).then(function(respuesta) {
                if (respuesta.data == 0) {
                    app.$data.labelEmail = "Este email ya existe en la base de datos";
                    app.$data.existente = false;
                }

                else {
                    app.$data.labelEmail = "Este email es válido";
                    app.$data.existente = true;
                }
            });


        },

        // Validar Registro

        validarRegistro: function(event) {

            let usuario = document.querySelector("#usuarioRegistro").value;
            let password = document.querySelector("#passwordRegistro").value;
            let email = document.querySelector("#emailRegistro").value;
            let terminos = document.querySelector("#terminos").checked;

            // Validar usuario

            if(usuario != '') {
                let caracteres = usuario.length;
                let expresion = /^[a-zA-Z0-9]*$/;

                if(caracteres > 6) {
                    document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";
                    return false;
                }

                if (!expresion.test(usuario)) {
                    document.querySelector("label[for='usuarioRegistro']").innerHTML += "<br>No escriba Caracteres Especiales";
                    return false;
                }
            }

            //validar password

            if(password != '') {
                let caracteres = password.length;
                let expresion = /^[a-zA-Z0-9]*$/;

                if(caracteres < 6) {
                    document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";
                    return false;
                }

                if (!expresion.test(password) && (!pattern.test(password))) {
                    document.querySelector("label[for='passwordRegistro']").innerHTML += "<br>No escriba Caracteres Especiales";
                    return false;
                }
            }

            //validar email
            
            if(email != '') {
                let expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})$/;

                if (!expresion.test(email)) {
                    document.querySelector("label[for='emailRegistro']").innerHTML += "<br>Escriba Correctamente el E-mail";
                    return false;
                }
            }

            //validar terminos

            if (!terminos) {
                console.log(terminos);

                document.querySelector("form").innerHTML += "<br>No se logró el Registro, acepte Términos y Condiciones";
                document.querySelector("#usuarioRegistro").value = usuario;
                document.querySelector("#passwordRegistro").value =password;
                document.querySelector("#emailRegistro").value = email;
                
                return false;
            }

            if (app.$data.existente == false) {
                document.querySelector("form").innerHTML += "<br>No se logró el Registro, el usuario o email ya están tomados";
                event.preventDefault();
                return false
            }
            else if(app.$data.existente == true) {
                console.log(app.$data.existente);
                return true;
            }

            return true;
        },

        // fin validar registro
    }
});
