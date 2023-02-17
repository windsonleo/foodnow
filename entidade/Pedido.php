
<?php 

class Pedido{
	
	private $id;
	private $ativo;
	public Cliente $cliente;

	public $valortotal;
	public $valorpago;

	public $dataregistro;

	public $totalitens;

	public $arr_itens = array();

	public $status;

	public Endereco $endereco;

	public $foientregue=false;
	public $foipago=false;

	public $formapagamento;




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


			public function getvalortotal(){
		return $this->valortotal;

	}

	public function setvalortotal($valor){
		$this->valortotal = $valor;

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


			public function getvalorpago(){
		return $this->valorpago;

	}

	public function setvalorpago($valor){
		$this->valorpago = $valor;

	}

			public function gettotalitens(){
		return $this->totalitens;

	}

	public function settotalitens($valor){
		$this->totalitens = $valor;

	}


		public function getstatus(){
		return $this->status;

	}

	public function setstatus($valor){
		$this->status = $valor;

	}


		public function get_endereco(){


		return $this->endereco;
	}


		public function setendereco($valor){
		$this->endereco = $valor;

	}


			public function getformapagamento(){


		return $this->formapagamento;
	}


		public function setformapagamento($valor){
		$this->formapagamento = $valor;

	}

}



?>