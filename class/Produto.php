<?php

class Produto {
	public $id;
	public $nome;
	public $preco;
	public $descricao;
	public $categoria;
	public $usado;

	public function precoComDesconto($valor = 0.1) {
		$preco  = $this->preco;
		$preco -= $preco * $valor;
		return $preco;
	}
}