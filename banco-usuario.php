<?php
require_once('conecta.php');
function buscaUsuario($conexao, $email, $senha) {
	$email     = mysqli_real_escape_string($conexao, $email);
	$senha     = mysqli_real_escape_string($conexao, $senha);
	$senhaMd5  = md5($senha);
	$query     = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	$usuario   = mysqli_fetch_assoc($resultado);

	return $usuario;
}