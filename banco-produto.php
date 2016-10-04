<?php
require_once('conecta.php');

function listaProdutos($conexao) {
	$produtos = array();
	$resultado = mysqli_query($conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}
	return $produtos;
}

function insereProduto($conexao, Produto $produto) {
	$produto->nome      = mysqli_real_escape_string($conexao, $produto->nome);
	$produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
	$produto->preco     = mysqli_real_escape_string($conexao, $produto->preco);
	
	$query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values ('{$produto->nome}', {$produto->preco}, '{$produto->descricao}', {$produto->categoria_id}, {$produto->usado})";
	return mysqli_query($conexao, $query);
}

function alteraProduto($conexao, Produto $produto) {
	$produto->nome      = mysqli_real_escape_string($conexao, $produto->nome);
	$produto->descricao = mysqli_real_escape_string($conexao, $produto->descricao);
	$produto->preco     = mysqli_real_escape_string($conexao, $produto->preco);
	
	$query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', categoria_id= {$produto->categoria_id}, usado = {$produto->usado} where id = '{$produto->id}'";

	return mysqli_query($conexao, $query);
}


function buscaProduto($conexao, $id) {
	$query = "select * from produtos where id = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function removeProduto($conexao, $id) {
	$query = "delete from produtos where id = {$id}";
	return mysqli_query($conexao, $query);
}