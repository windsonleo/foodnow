<?php
include "entidade/Carrinho.php";
include "entidade/Item.php";
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
	
	
	
	
	
	
	
		
	$carrinho = $_SESSION['carrinho'];
	$carrinho->addItens($item);
	$totalitenscarrinho = $carrinho -> CalcularTotalItens();
        $totalvalorcarrinho = $carrinho -> CalcularTotal();
  	$carrinho->settotalitens($totalitenscarrinho);
  	$carrinho->settotalvalor($totalvalorcarrinho);
	$_SESSION['carrinho'] =  $carrinho;
	 $_SESSION['totalvalor'] = $totalvalorcarrinho;
        $_SESSION['totalitem'] = $totalitenscarrinho ;
		
		
	$cliente = $_SESSION['cliente'];
	$carrinho = $_SESSION['carrinho'];
	$carrinho->setcliente($cliente);
	$_SESSION['cliente']=$cliente;
	$_SESSION['carrinho'] = $carrinho;
		
		
	 $endereco = $_SESSION['endereco'];
		
		
	  $cliente = $_SESSION['cliente'];

    	   $cliente->setendereco($endereco);
	$endereco->setcliente($cliente);


    $_SESSION['endereco_id'] = 0;
   // echo 'endereco NAO setado : ' ;
      $temendereco = false;

      $_SESSION['temendereco'] = $temendereco;
		
	$_SESSION['endereco'] = $endereco;
	$_SESSION['cliente']=$cliente;
		
		
$carrinho = $_SESSION['carrinho'];

  if($carrinho->getid()==null){

    $idcarrinho = $carrinho->guidv4();

      $carrinho->setid($idcarrinho);
      $_SESSION['carrinho'] = $carrinho;

  }
	


}

	
 

 //header('Location: https://foodnoww.000webhostapp.com/');

    header('Location: https://foodnow-production.up.railway.app/');
    exit();




?>
