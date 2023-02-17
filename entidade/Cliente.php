<?php

//require_once ('Endereco.php');

class Cliente{
	
	private $id;
	private $ativo;
	public $nome;
	public $email;
	public $telefone;
	private $dataregistro;
	private $datanascimento;
	public $arr_pedidos = array();
	public Endereco $endereco ;


/*	public function Cliente($id,$nome,$email,$telefone,$endereco,$pedidos,$ativo,$dataregistro,$datanascimento){

	$this->id = $id;
	$this->nome = $nome;
    $this->email = $email;
    $this->telefone = $telefone;
    $this->endereco = $endereco;
     $this->arr_pedidos = $pedidos;
    $this->ativo = $ativo;
    $this->dataregistro = $dataregistro;
    $this->datanascimento = $datanascimento;


	} */

	/*	public function Cliente(){


	} */



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


	public function getemail(){
		return $this->email;

	}

	public function setemail($valor){
		$this->email = $valor;

	}


	public function getdataregistro(){
		return $this->dataregistro;

	}

	public function setdataregistro($valor){
		$this->dataregistro = $valor;

	}



		public function getdatanascimento(){
		return $this->datanascimento;

	}

	public function setdatanascimento($valor){
		$this->datanascimento = $valor;

	}

			public function gettelefone(){
		return $this->telefone;

	}

	public function settelefone($valor){
		$this->telefone = $valor;

	}




			public function getarr_pedidos(){
		return $this->arr_pedidos;

	}

	public function setarr_pedidos($valor){
		$this->arr_pedidos = $valor;

	}



		public function addPedido($valor){
		return $this->arr_pedidos[]=$valor;

	}

	public function get_endereco(){


		return $this->endereco;
	}


		public function setendereco($valor){
		$this->endereco = $valor;

	}


		public function getDetalhes(){

		return " Id :{$this->id} <br /> nome : {$this->nome} <br /> email :{$this->email} <br />
		pedidos : {$this->arr_pedidos}  <hr> <br />";
	}


		public function __toString() {

		 return "nome :  {$this->nome} <br />";


	}


}


