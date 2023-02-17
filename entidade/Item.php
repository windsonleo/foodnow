<?php


class Item{
	
	private $id;
	private $idprod;
	private $ativo;
	private $nome;
	public $preco;
	private $dataregistro;
	private $foto;
	private $qtd;
	private $obs;
	private $pedido;


	


  function __construct($nome, $preco,$qtd, $foto,$idprod) {
   
  
    $this->nome = $nome;
    $this->preco = $preco;
    $this->qtd = $qtd;
    $this->foto = $foto;
    $this->idprod = $idprod;

  }




	public function getid(){
		return $this->id;

	}

	public function setid($valor){
		$this->id = $valor;

	}

		public function getidprod(){
		return $this->idprod;

	}

	public function setidprod($valor){
		$this->idprod = $valor;

	}


			public function getpedido(){
		return $this->pedido;

	}

	public function setpedido($valor){
		$this->pedido = $valor;

	}

	public function getobs(){
		return $this->obs;

	}

	public function setobs($valor){
		$this->obs = $valor;

	}

		public function getativo(){
		return $this->ativo;

	}

	public function setativo($valor){
		$this->ativo = $valor;

	}

	public function getqtd(){
		return $this->qtd;

	}

	public function setqtd($valor){
		$this->qtd = $valor;

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


				public function getpreco(){
		return $this->preco;

	}

	public function setpreco($valor){
		$this->preco = $valor;

	}



	public function getnome(){
		return $this->nome;

	}

	public function setnome($valor){
		$this->nome = $valor;

	}





	public function getDetalhes(){

		return " Id :{$this->id} <br /> nome : {$this->nome} <br /> preco :{$this->preco} <br />
		qtd : {$this->qtd}  <hr> <br />";
	}



		public function RetornarValoresArrays($valores){

		$valor = '';

		foreach ($valores as $val) {
    		
    		echo  $val;

    		$valor = $valor + $val;
		}

		return $valor;
	}


	public function guidv4($data = null) {
    // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    // Set version to 0100
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    // Set bits 6-7 to 10
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    // Output the 36 character UUID.
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}


}