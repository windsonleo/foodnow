<?php

/*include "Consulta.php";
include "Paciente.php";*/

require_once("Categoria.php");

class Produto{
	
	private $id;
	private $ativo;
	private $nome;
	private $foto;
	private $descricao;
	private $preco;
	private $dataregistro;
	private Categoria $categoria;


	public function getid(){
		return $this->id;

	}

	public function setid($valor){
		$this->id = $valor;

	}

		public function getativo(){
		return $this->ativo;

	}

	public function setativo($valor){
		$this->ativo = $valor;

	}

	public function getnome(){
		return $this->nome;

	}

	public function setnome($valor){
		$this->nome = $valor;

	}



	public function getdataregistro(){
		return $this->dataregistro;

	}

	public function setdataregistro($valor){
		$this->dataregistro = $valor;

	}

	public function getfoto(){
		return $this->foto;

	}

	public function setfoto($valor){
		$this->foto = $valor;

	}

		public function getdescricao(){
		return $this->descricao;

	}

	public function setdescricao($valor){
		$this->descricao = $valor;

	}

			public function getpreco(){
		return $this->preco;

	}

	public function setpreco($valor){
		$this->preco = $valor;

	}


				public function getcategoria(){
		return $this->categoria;

	}

	public function setcategoria($valor){
		$this->categoria = $valor;

	}





	public function getDetalhes(){

		return " Id :{$this->id} <br /> Nome : {$this->nome} <br /> categoria :{$this->categoria} <br />
		preco : {$this->preco}  <hr> <br />";
	}


}

/*
$ps1 = new Psicologo();
$ps1->setnome('mirelli');
$ps1->setemail('mireli@gmail.com');
$ps1->setfoto('mireli.jpg');
$ps1->settelefone('81-98788876');
$ps1->setdatanascimento('31/12/1983');
$ps1->setid(235);

//echo $ps1->getDetalhes();

var_dump($ps1);

*/