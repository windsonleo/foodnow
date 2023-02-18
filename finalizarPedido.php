<?php

//$teste = $_GET;

include "entidade/Item.php";
include "entidade/Carrinho.php";
include "entidade/Cliente.php";
include "entidade/Endereco.php";
include "entidade/Pedido.php";

session_start();



$servername = "host=containers-us-west-54.railway.app";
$username = "user=postgres";
$password = "password=GRdKW3TVxT3NuZwQa0EZ";
$dbname="dbname=railway";
$porta = "port=6973";

// Create connection
//$conn = mysqli_connect($servername, $username,$password,$dbname,$porta);

$conn = pg_connect("$servername $porta $dbname $username $password");
// Check connection
if (!$conn) {
  die("Falha na Conexao: " . pg_result_error($conn));
}



//pegar o carrinho da sessao

$carrinho = $_SESSION["carrinho"];
$cliente = $_SESSION["cliente"];
$endereco =  $_SESSION["endereco"];
$pagamento = $_SESSION["pagamento"];

$idclienteaux = null;
$idenderecoaux = null;

//dados do cliente



$clienteativo = 1;
$clientenome = $cliente->getnome();
$clienteemail = $cliente->getemail();
$clientetelefone = $cliente->gettelefone();
$clientedatanascimento = $cliente->getdatanascimento();


InserirCliente($clienteativo,$clientenome,$clienteemail,$clientetelefone,$clientedatanascimento,$conn);

function InserirCliente($clienteativo,$clientenome,$clienteemail,$clientetelefone,$clientedatanascimento,$conexao){
  $conn = $conexao;

$sql = "INSERT INTO cliente (id, ativo, nome, email, telefone, datanascimento,endereco_id, dataregistro)
VALUES (NULL, $clienteativo, '$clientenome', '$clienteemail' , '$clientetelefone','$clientedatanascimento',NULL, now())";
  $result = pg_query($conn, $sql);

if (pg_query($conn, $sql)) {
  echo "Registro cliente incluido com sucesso";

  printf( "ID %d.\n" , pg_last_oid ($result));

  echo "\n", pg_last_oid ($result);

  $idclienteaux =  pg_last_oid ($result);

  //echo "id cliente aux". $idclienteaux;

 // mysqli_close($conn);
  // header("Location: http://foodnow.com/finalizasessao.php");
  // exit();

} else {
  echo "Error add cliente: " . $sql . "<br>" . pg_result_error($result);
}



}

//incluir endereco

$enderecoativo=1;
$enderecoclienteid=pg_last_oid($result);
$enderecologradouro = $endereco->getlogradouro();
$enderecouf = $endereco->getuf();
$enderecocidade = $endereco->getcidade();
$enderecobairro = $endereco->getbairro();
$enderecocep = $endereco->getcep();
$endereconumero=$endereco->getnumero();
$enderecocomplemento = $endereco->getcomplemento();




InserirEndereco($enderecoativo,$enderecoclienteid,$enderecologradouro,$enderecouf,$enderecocidade,$enderecobairro,$enderecocep,$endereconumero,$enderecocomplemento,$conn);

function InserirEndereco($enderecoativo,$enderecoclienteid,$enderecologradouro,$enderecouf,$enderecocidade,$enderecobairro,$enderecocep,$endereconumero,$enderecocomplemento,$conexao){
  $conn = $conexao;

$sql2 = "INSERT INTO endereco (id, ativo, cliente_id, logradouro, uf, cidade,bairro,cep,numero,complemento, dataregistro)
VALUES (NULL, $enderecoativo, $enderecoclienteid, '$enderecologradouro' , '$enderecouf','$enderecocidade','$enderecobairro','$enderecocep','$endereconumero','$enderecocomplemento', now())";
$result = pg_query($conn, $sql2);
if (pg_query($conn, $sql2)) {
  echo "Registro endereco incluido com sucesso";

  printf( "ID enderco %d.\n" , pg_last_oid ($result));

  echo "\n", pg_last_oid ($result);

  $idenderecoaux =  pg_last_oid ($result);

  //echo "id cliente aux". $idclienteaux;

 // mysqli_close($conn);
  // header("Location: http://foodnow.com/finalizasessao.php");
  // exit();

} else {
  echo "Error add endereco: " . $sql2 . "<br>" . pg_result_error($result);
}



}



//criar pedido com elementos do carrinho

$pedido = new Pedido();
//$pedido->setid();
$pedidoativo=1;
$pedidoclienteid = $enderecoclienteid;
$pedidovalortotal = $carrinho -> CalcularTotal();
$pedidovalorpago = (0.00);
$pedidototalitens = $carrinho -> CalcularTotalItens();
$pedidostatus = 'PENDENTE';
$pedidoenderecoid = pg_last_oid ($result);
$pedidopagamento = $pagamento;
$foientregue = 0;
$foipago = 0;




/*$pedido->setativo(1);
$pedido->setcliente($enderecoclienteid);
$pedido->setvalortotal($carrinho -> CalcularTotal());
$pedido->setvalorpago(0.00);
$pedido->settotalitens($carrinho -> CalcularTotalItens());
$pedido->setstatus('PENDENTE');
$pedido->setendereco($idenderecoaux);
$pedido->setformapagamento($pagamento);
$pedido->setarr_itens($carrinho->getarr_itens());*/






//salvar pedido

InserirPedido($pedidoativo,$pedidoclienteid,$pedidovalortotal,$pedidovalorpago,$pedidostatus,$pedidoenderecoid,$foientregue,$foipago,$pedidopagamento,$conn);

function InserirPedido($pedidoativo,$pedidoclienteid,$pedidovalortotal,$pedidovalorpago,$pedidostatus,$pedidoenderecoid,$foientregue,$foipago,$pedidopagamento,$conexao){
  $conn = $conexao;

 //VALUES (NULL, '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, CURRENT_TIMESTAMP)

$sql3 = "INSERT INTO pedido (id, ativo, cliente_id, valortotal, valorpago, status,endereco_id,foientregue,foipago,formapagamento, dataregistro)
VALUES (NULL, $pedidoativo, $pedidoclienteid, '$pedidovalortotal' , '$pedidovalorpago','$pedidostatus',$pedidoenderecoid,'$foientregue','$foipago','$pedidopagamento', now())";

  $result = pg_query($conn, $sql3);
if (pg_query($conn, $sql3)) {

  $idped =  pg_last_oid ($result);
  echo "Registro pedido incluido com sucesso, id: " .$idped;
  pg_close($conn);
   header("Location: https://foodnow-production.up.railway.app/finalizasessao.php");
   exit();

} else {
  echo "Error: " . $sql3 . "<br>" . pg_result_error($result);
}



}





 //header('Location: https://foodnoww.000webhostapp.com/finalizapedido.php');

  //  header('Location: http://foodnow.com/finalizasessao.php');
    exit();




?>
