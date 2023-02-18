<?php


include 'Cliente.php';

class Carrinho{
	
	private $id;
	private $ativo;
	public Cliente $cliente;

	public $totalvalor;
	private $dataregistro;

	public $totalitens;

	public $arr_itens = array();







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

	public function getcliente(){
		return $this->cliente;

	}

	public function setcliente($valor){
		$this->cliente = $valor;

	}



	public function getdataregistro(){
		return $this->dataregistro;

	}

	public function setdataregistro($valor){
		$this->dataregistro = $valor;

	}



			public function gettotalitens(){
		return $this->totalitens;

	}

	public function settotalitens($valor){
		$this->totalitens = $valor;

	}



			public function gettotalvalor(){
		return $this->totalvalor;

	}

	public function settotalvalor($valor){
		$this->totalvalor = $valor;

	}

		public function getarr_itens(){
		return $this->arr_itens;

	}

	public function setarr_itens($valor){
		$this->arr_itens = $valor;

	}



		public function addItens($valor){
		return $this->arr_itens[]=$valor;

	}





	public function getDetalhes(){

		return " Id :{$this->id} <br /> cliente : {$this->cliente} <br /> total :{$this->total} <br />
		itens : {$this->itens}  <hr> <br />";
	}



		public function RetornarValoresArrays($valores){

		$valor = '';

		foreach ($valores as $val) {
    		
    		echo  $val;

    		$valor = $valor + $val;
		}

		return $valor;
	}



		public function CalcularTotal(){

		$valor = 0.00;

		$aux = $this->getarr_itens();

		$valoraux ="0.00";

		foreach ($aux as $val) {
    		
    		//echo  $val["preco"];
    		$valoraux = $val->preco;

    	//	$valorconvertido = number_format($valoraux,2);

    		$valorconvertido = floatval($valoraux);

    		$valor = $valor + $valorconvertido;
		}

		return $valor;
	}



		public function CalcularTotalItens(){

				$aux = $this->getarr_itens();

		$tot = count($aux);


		return $tot;
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



		public function __toString() {

		 return "Carrinho :  $this->id. cliente $this->cliente. itens $this->arr_itens  ";


	}


}
