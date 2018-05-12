// Validar Registro

function validarIngreso() {

    let usuario = document.querySelector("#usuarioIngreso").value;
    let password = document.querySelector("#passwordIngreso").value;

    // Validar usuario

     if(usuario != '') {
         let caracteres = usuario.length;
         let expresion = /^[a-zA-Z0-9]*$/;
         if(caracteres > 6) {
             document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>Escriba por favor menos de 6 caracteres.";
             return false;
         }

         if (!expresion.test(usuario)) {
             document.querySelector("label[for='usuarioIngreso']").innerHTML += "<br>No escriba Caracteres Especiales";
             return false;
         }
     }

    //validar password

     if(password != '') {
         let caracteresPass = password.length;
         let expresion = /^[a-zA-Z0-9]*$/;

        if (!expresion.test(password)) {
            document.querySelector("label[for='passwordIngreso']").innerHTML += "<br>No escriba Caracteres Especiales";
            return false;
        }
     }
    
    return true;
}

// Fin Validar Registro