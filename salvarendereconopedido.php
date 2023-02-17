<?php

//$teste = $_GET;

include "entidade/Item.php";
include "entidade/Carrinho.php";
include "entidade/Cliente.php";
include "entidade/Endereco.php";

session_start();





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardapio";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Falha na Conexao: " . mysqli_connect_error());
}


$telefone = $_POST["telefone"];

$_SESSION['tel'] = $telefone;

$end = $_SESSION['endereco'];

//$cep = $_POST["cep"];


  $sqlcliente = mysqli_query($conn,"select * from cliente where telefone = " ."'" .$telefone ."'") or die("Erro");

while($dadoscli = mysqli_fetch_assoc($sqlcliente)){

  $id = $dadoscli['id'];
  $nome = $dadoscli['nome'];
  $email = $dadoscli['email'];
  $telefone = $dadoscli['telefone'];
  $enderecoaux = $dadoscli['endereco_id'];
 // $pedidos = $dadoscli['arr_pedidos'];
  $ativo = $dadoscli['ativo'];
  $dataregistro = $dadoscli['dataregistro'];
  $datanascimento = $dadoscli['datanascimento'];

  $cliente = new Cliente();
  $cliente->setid($id);
  $cliente->setnome($nome);
  $cliente->setemail($email);
  $cliente->settelefone($telefone);
 // $cliente->setendereco($enderecoaux);
 // $cliente->setarr_pedidos($pedidos);
  $cliente->setativo($ativo);
  $cliente->setdataregistro($dataregistro);
  $cliente->setdatanascimento($datanascimento);
  $cliente->setendereco($end);


  //$id,$nome,$email,$telefone,$endereco,$pedidos,$ativo,$dataregistro,$datanascimento);



  

  $_SESSION['cliente'] = $cliente;

  	$carrinho = $_SESSION["carrinho"];
     $carrinho->setcliente($cliente);
      $totalitenscarrinho = $carrinho -> CalcularTotalItens();
      $totalvalorcarrinho = $carrinho -> CalcularTotal();
	  $carrinho->settotalitens($totalitenscarrinho);
	  $carrinho->settotalvalor($totalvalorcarrinho);

  $_SESSION['endereco_id'] = $enderecoaux ;


	$_SESSION['carrinho'] = $carrinho;
  
	$_SESSION['totalitem'] = $totalitenscarrinho;
	
	$_SESSION['totalvalor'] = $totalvalorcarrinho;

  $_SESSION['endereco'] = $cliente->get_endereco();
  $_SESSION['temendereco']=true;

  $_SESSION['tel'] = $cliente->gettelefone();

  $_SESSION['existecliente']=true;

 
}


 //header('Location: https://foodnoww.000webhostapp.com/finalizapedido.php');

    header('Location: http://foodnow.com/finalizapedidopaga.php');
    exit();




?>