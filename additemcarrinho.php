<?php

//$teste = $_GET;



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

// Create connection
//$conn = mysqli_connect($servername, $username,$password,$dbname,$porta);

$conn = pg_connect("$servername $porta $dbname $username $password");

// Create connection
//$conn = mysqli_connect($servername, $username);
//$banco = mysqli_select_db($conn,$dbname);
//mysqli_set_charset($conn,'utf8');
// Check connection
if (!$conn) {
  die("Falha na Conexao: " . pg_connection_status($conn));
}


$id = $_GET["idprod"];
$ativo = 1;
$qtd = $_GET["qtd"];


$cliente = $_SESSION["cliente"];

$carrinho = $_SESSION["carrinho"];

$endereco = $_SESSION["endereco"];



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

  //$carrinho = $_SESSION["carrinho"];
   // $cliente = $_SESSION["cliente"];
  //  $endereco = $_SESSION["endereco"];
     $carrinho->setcliente($cliente);
  	$carrinho->addItens($item);
      $totalitenscarrinho = $carrinho -> CalcularTotalItens();
      $totalvalorcarrinho = $carrinho -> CalcularTotal();
  $carrinho->settotalitens($totalitenscarrinho);
  $carrinho->settotalvalor($totalvalorcarrinho);


  if($carrinho->getid()==null){

    $idcarrinho = $carrinho->guidv4();

      $carrinho->setid($idcarrinho);

  }else {

    $carrinho->setcliente($cliente);


  }

	$_SESSION['carrinho'] = $carrinho;
  
	$_SESSION['totalitem'] = $totalitenscarrinho;
	
	$_SESSION['totalvalor'] = $totalvalorcarrinho;

  	$_SESSION['cliente'] = $cliente;

	$_SESSION['endereco'] = $endereco;




}






/*if(!isset($_SESSION['carrinho'])){

//adiciona o item

	$carrinho =new Carrinho();

	$carrinho->addItens($item);

    $_SESSION['carrinho'] = $carrinho;
    $totalitenscarrinho = $carrinho -> CalcularTotalItens();
	$_SESSION['totalitem'] = $totalitenscarrinho;


}else {


    $carrinho = $_SESSION['carrinho'];
    $carrinho -> addItens($item);
    $totalitenscarrinho = $carrinho -> CalcularTotalItens();
	$_SESSION['totalitem'] = $totalitenscarrinho;
 	$_SESSION['carrinho'] = $carrinho;


}

if(!isset($_SESSION['cliente'])){

//adiciona o item

	$cliente = "dinho";

    $_SESSION['cliente'] = $cliente;


}else {


    $cliente = $_SESSION['cliente'];
    $carrinho -> setcliente($cliente);
	$_SESSION['cliente'] = $cliente;

}*/


 //header('Location: https://foodnoww.000webhostapp.com/');

    header('Location: https://foodnow-production.up.railway.app/');
    exit();




?>
