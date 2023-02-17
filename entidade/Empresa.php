<?php

/*include "Consulta.php";
include "Paciente.php";*/


class Empresa{
	
	private $id;
	private $ativo;
	private $nome;
	private $logo;
	private $email;
	private $telefone;
	private $dataregistro;


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

	public function getlogo(){
		return $this->logo;

	}

	public function setlogo($valor){
		$this->logo = $valor;

	}

		public function getemail(){
		return $this->email;

	}

	public function setemail($valor){
		$this->email = $valor;

	}

			public function gettelefone(){
		return $this->telefone;

	}

	public function settelefone($valor){
		$this->telefone = $valor;

	}





	public function getDetalhes(){

		return " Id :{$this->id} <br /> Nome : {$this->nome} <br /> email :{$this->email} <br />
		telefone : {$this->telefone}  <hr> <br />";
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