<?php
include "entidade/Item.php";
include "entidade/Carrinho.php";
include "entidade/Cliente.php";
include "entidade/Endereco.php";
session_start();



$servername = "host=containers-us-west-54.railway.app";
$username = "user=postgres";
$password = "password=GRdKW3TVxT3NuZwQa0EZ";
$dbname="dbname=railway";
$porta = "port=6973";

$conn = pg_connect("$servername $porta $dbname $username $password");

// Check connection
if (!$conn) {
  die("Falha na Conexao: " . pg_connection_status($conn));
}


$id = $_GET["idprod"];
$ativo = 1;
$qtd = $_GET["qtd"];



  $sqlcat = pg_query($conn,"select * from produto where id = {$id}") or die("Erro");

while($dadosprod = pg_fetch_assoc($sqlcat)){

 $idprod = $dadosprod['id'];
  $itemnome = $dadosprod['nome'];
  $itempreco = $dadosprod['preco'];
  $itemqtd = $qtd;
  $itemfoto = $dadosprod['foto'];

  $item = new Item($itemnome,$itempreco,$itemqtd,$itemfoto,$idprod);
  $iditem = $item->guidv4();
  $item->setid($iditem);
	
	
	
	
	
	
	if(isset($_SESSION['carrinho'])) {
		
	$carrinho = $_SESSION["carrinho"];
		
	}else {
		
		$carrinho = new Carrinho();
		 $_SESSION["carrinho"]=$carrinho;
		
	}
	
	if(isset($_SESSION['cliente'])){
		
	$cliente = $_SESSION["cliente"];
		
	}else{
		
		$cliente = new Cliente();
		 $_SESSION["cliente"]=$cliente;
		
	}
		
	
	if(isset($_SESSION['endereco'])){
		
	 $endereco = $_SESSION["endereco"];
		
		
	}else{
		
		$endereco = new Endereco();
		$_SESSION["endereco"] = $endereco;
		
		
	}
	
     $carrinho->setcliente($cliente);
     $carrinho->addItens($item);
      $totalitenscarrinho = $carrinho -> CalcularTotalItens();
      $totalvalorcarrinho = $carrinho -> CalcularTotal();
  $carrinho->settotalitens($totalitenscarrinho);
  $carrinho->settotalvalor($totalvalorcarrinho);


  if($carrinho->getid()==null){

    $idcarrinho = $carrinho->guidv4();

      $carrinho->setid($idcarrinho);

  }
	$cliente->setendereco($endereco);
	$endereco->setcliente($cliente);
	$carrinho->setcliente($cliente);
	//$carrinho->setendereco($endereco);
	
	 
	    






}

	$_SESSION['carrinho'] = $carrinho;
  
	$_SESSION['totalitem'] = $totalitenscarrinho;
	
	$_SESSION['totalvalor'] = $totalvalorcarrinho;

  	$_SESSION['cliente'] = $cliente;
	$_SESSION['endereco']=$endereco;





 //header('Location: https://foodnoww.000webhostapp.com/');

    header('Location: https://foodnow-production.up.railway.app/');
    exit();




?>
