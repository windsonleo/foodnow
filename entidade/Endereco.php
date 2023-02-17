<?php

//include 'Cliente.php';

class Endereco{
	
	private $id;
	private $ativo;
	public $logradouro;
	public $uf;
	private $cidade;
	private $bairro;
	public $cep;
	public $numero;
	public $complemento;
	private $dataregistro;
	public Cliente $cliente;





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

	public function getlogradouro(){
		return $this->logradouro;

	}

	public function setlogradouro($valor){
		$this->logradouro = $valor;

	}


	public function getuf(){
		return $this->uf;

	}

	public function setuf($valor){
		$this->uf = $valor;

	}


	public function getdataregistro(){
		return $this->dataregistro;

	}

	public function setdataregistro($valor){
		$this->dataregistro = $valor;

	}



		public function getcidade(){
		return $this->cidade;

	}

	public function setcidade($valor){
		$this->cidade = $valor;

	}


			public function getbairro(){
		return $this->bairro;

	}

	public function setbairro($valor){
		$this->bairro = $valor;

	}



			public function getcep(){
		return $this->cep;

	}

	public function setcep($valor){
		$this->cep = $valor;

	}



			public function getnumero(){
		return $this->numero;

	}

	public function setnumero($valor){
		$this->numero = $valor;

	}



			public function getcomplemento(){
		return $this->complemento;

	}

	public function setcomplemento($valor){
		$this->complemento = $valor;

	}


	public function getcliente(){
		return $this->cliente;

	}

	public function setcliente($valor){
		$this->cliente = $valor;

	}





		public function getDetalhes(){

		return " Id :{$this->id} <br /> logradouro : {$this->logradouro} <br /> numero :{$this->numero} <br />
		bairro : {$this->bairro}  <hr> <br />";
	}



	public function __toString() {

		 return " {$this->logradouro} , n° :{$this->numero} , {$this->cidade}  id:{$this->id}  ";


	}





}


?>