<?php

function usuarioEstaLogado() {
	return isset($_COOKIE['usuario_logado']);
}

function verificaUsuario() {
	if(!usuarioEstaLogado()) {
		header("Location: index.php?falhaDeSeguranca=true");
		die();
	}
}

function usuarioLogado() {
	return $_COOKIE['usuario_logado'];
}

function logaUsuario($usuario) {
	setcookie("usuario_logado", $usuario, time() + 60);
}
?>