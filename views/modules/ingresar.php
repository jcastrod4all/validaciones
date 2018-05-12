<h1>INGRESAR</h1>

	<form method="post" onsubmit="return validarIngreso()">
		<label for="usuarioIngreso">Usuario</label>
		<input type="text" placeholder="Usuario" name="usuarioIngreso" id="usuarioIngreso" required>
		<label for="passwordIngreso">Contraseña</label>
		<input type="password" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso" required>

		<input type="submit" value="Entrar">

	</form>

<?php
$ingreso = new MvcController();
$ingreso->ingresoUsuarioController();

if(isset($_GET["action"])) {
	if ($_GET["action"] == "fallo") {
		echo "Ingreso ha fallado :( !";
	}

	if ($_GET["action"] == "fallo3intentos") {
		echo "Ha fallado 3 veces para ingresar, favor de llenar el captcha";
	}
}

?>