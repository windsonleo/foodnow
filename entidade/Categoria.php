<?php

/*include "Consulta.php";
include "Paciente.php";*/



class Categoria{
	
	private $id;
	private $ativo;
	private $nome;
	private $foto;
	private $dataregistro;
	public $arr_produtos = array();


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



		public function addProduto($valor){
		return $this->arr_produtos[]=$valor;

	}


	public function getarr_produtos(){
		return $this->arr_produtos;

	}

	public function setarr_produtos($valor){
		$this->arr_produtos = $valor;

	}



	public function getDetalhes(){

		return " Id :{$this->id} <br /> Nome : {$this->nome} <br /> foto :{$this->foto} <br />
		dataregistro : {$this->dataregistro}  <hr> <br />";
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