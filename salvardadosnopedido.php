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

// Create connection
//$conn = mysqli_connect($servername, $username,$password,$dbname,$porta);

$conn = pg_connect("$servername $porta $dbname $username $password");
// Check connection
if (!$conn) {
  die("Falha na Conexao: " . pg_status_error());
}


$telefone = $_POST["telefone"];

$_SESSION['tel'] = $telefone;

$end = $_SESSION['endereco'];

$pagamento = $_POST["customRadio"];
$troco = $_POST["troco"];

$_SESSION['pagamento'] = $pagamento;
$_SESSION['troco'] = $troco;



//dados endereco

$cep = $_POST["cep"];
$logradouro = $_POST["logradouro"];

$numero = $_POST["numero"];
$bairro = $_POST["bairro"];

$uf = $_POST["uf"];
$localidade = $_POST["localidade"];

$complemento = $_POST["complemento"];



//dados cliente

$idcliente = $_POST["id"];

//$ativocliente = $_POST["ativo"];

$nomecliente = $_POST["nome"];

$emailcliente = $_POST["email"];

$telefonecliente= $_POST["telefone"];

$datanascimentocliente = $_POST["datanascimento"];

$enderecocliente = $_POST["endereco"];

//$dataregistrocliente = $_POST["dataregistro"];



//dados do pedido


//endereco

$enderecoaux = new Endereco();
//$enderecoaux->setid();
//$enderecoaux->setativo();

$enderecoaux->setlogradouro($logradouro);
$enderecoaux->setuf($uf);
$enderecoaux->setnumero($numero);
$enderecoaux->setcidade($localidade);
$enderecoaux->setbairro($bairro);
$enderecoaux->setcomplemento($complemento);
$enderecoaux->setcep($cep);

//$enderecoaux->setdataregistro();


//cliente

$clienteaux = new Cliente();
//$clienteaux->setid();
//$clienteaux->setativo();
$clienteaux->setnome($nomecliente);
$clienteaux->setemail($emailcliente);
$clienteaux->settelefone($telefonecliente);
//$clienteaux->setdataregistro();
$clienteaux->setdatanascimento($datanascimentocliente);
$clienteaux->setendereco($enderecoaux);


//relacao entre cliente e endereco
$enderecoaux->setcliente($clienteaux);

$carrinho = $_SESSION['carrinho'];

$carrinho->setcliente($clienteaux);

$_SESSION['cliente'] = $clienteaux;

$_SESSION['endereco'] = $enderecoaux;

$_SESSION['carrinho']=$carrinho;





/*  $sqlcliente = pg_query($conn,"select * from cliente where telefone = '{$telefone}';") or die("Erro");

while($dadoscli = pg_fetch_assoc($sqlcliente)){

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
	  $carrinho->settotalvalor($totalvalorcarrinho);*/

  $_SESSION['endereco_id'] = $enderecoaux ;


	$_SESSION['carrinho'] = $carrinho;
  
	$_SESSION['totalitem'] = $totalitenscarrinho;
	
	$_SESSION['totalvalor'] = $totalvalorcarrinho;

  $_SESSION['endereco'] = $clienteaux->get_endereco();
  $_SESSION['temendereco']=true;

  $_SESSION['tel'] = $clienteaux->gettelefone();

  $_SESSION['existecliente']=true;

 
}


 //header('Location: https://foodnoww.000webhostapp.com/finalizapedido.php');

    header('Location: https://foodnow-production.up.railway.app/confirmardadosnopedido.php');
    exit();




?>
