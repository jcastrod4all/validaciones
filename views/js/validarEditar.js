// Validar Registro

function validarEditar() {

    let usuario = document.querySelector("#usuarioEditar").value;
    let password = document.querySelector("#passwordEditar").value;
    let email = document.querySelector("#emailEditar").value;

    // Validar usuario

    if(usuario != '') {
        let caracteres = usuario.length;
        let expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres > 6) {
            document.querySelector("#respuestaEditar").innerHTML += "<br>Escriba por favor menos de 6 caracteres para el nombre de usuario.";
            return false;
        }

        if (!expresion.test(usuario)) {
            document.querySelector("#respuestaEditar").innerHTML += "<br>No escriba Caracteres Especiales Para el Nombre de Usuario";
            return false;
        }
    }

    //validar password

    if(password != '') {
        let caracteres = password.length;
        let expresion = /^[a-zA-Z0-9]*$/;

        if(caracteres < 6) {
            document.querySelector("#respuestaEditar").innerHTML += "<br>Escriba por favor mas de 6 caracteres en la contraseña.";
            return false;
        }

        if (!expresion.test(password)) {
            document.querySelector("#respuestaEditar").innerHTML += "<br>No escriba Caracteres Especiales En La Contraseña";
            return false;
        }
    }

    //validar email
    
    if(email != '') {
        let expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})$/;

        if (!expresion.test(email)) {
            document.querySelector("#respuestaEditar").innerHTML += "<br>Escriba Correctamente el E-mail";
            return false;
        }
    }
    
    console.log(usuario,password,email);
    return true;
}

// Fin Validar Registro