<h1>REGISTRO DE USUARIO</h1>

<form method="post" v-on:submit="validarRegistro">
	<label for="usuarioRegistro">Usuario</label>
	<p>{{labelUsuario}}</p>
	<input type="text" v-model="usuario" v-on:change="revisarUsuario" placeholder="Máximo 6 Caracteres" maxlenght="6" name="usuarioRegistro" id="usuarioRegistro" required>
	<label for="passwordRegistro">Contraseña</label>
	<p></p>
	<input type="password" v-model="password" placeholder="Mínimo 6 caracteres, incluir numero (s) y una mayúscula" name="passwordRegistro" id="passwordRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>
	<label for="emailRegistro">Correo Electrónico</label>
	<p>{{labelEmail}}</p>
	<input type="email" v-model="email" v-on:change="revisarEmail" placeholder="Escriba correctamente su correo electrónico correctamente" name="emailRegistro" id="emailRegistro" required>

	<p><input type="checkbox" name="terminos" id="terminos"><a href="#">Acepta Términos y Condiciones</a></p>
	<input type="submit" value="Enviar">

</form>

<?php
//  onsubmit="return validarRegistro()"
$registro = new MvcController();
$registro->registroUsuarioController();

if (isset($_GET["action"])) {
	if ($_GET["action"] == "ok") {
		echo "Registro Exitoso";
	}
}

?>