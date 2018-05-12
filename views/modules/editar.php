<?php

session_start();

if(!$_SESSION["validar"]) {
	header("location:ingresar.php");

	exit();
}

?>

<h1>EDITAR USUARIO</h1>

<form method="post" onsubmit="return validarEditar()">
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario->editarUsuarioController();
	$editarUsuario->actualizarUsuarioController();

	?>
	<div id="respuestaEditar"></div>


