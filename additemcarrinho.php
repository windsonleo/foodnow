<?php



session_start();

include "entidade/Carrinho.php";
include "entidade/Item.php";
include "entidade/Cliente.php";
include "entidade/Endereco.php";


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
	
	var_dup($_SESSION);
	var_dup($item);
	
     $carrinho = $_SESSION['carrinho'];
      $carrinho->addItens($item);
      $totalitenscarrinho = $carrinho -> CalcularTotalItens();
      $totalvalorcarrinho = $carrinho -> CalcularTotal();
      $carrinho->settotalitens($totalitenscarrinho);
      $carrinho->settotalvalor($totalvalorcarrinho);
	
/*	if(isset($_SESSION['carrinho'])) {
      $carrinho = $_SESSION['carrinho'];
      $carrinho->addItens($item);
      $totalitenscarrinho = $carrinho -> CalcularTotalItens();
      $totalvalorcarrinho = $carrinho -> CalcularTotal();
      $carrinho->settotalitens($totalitenscarrinho);
      $carrinho->settotalvalor($totalvalorcarrinho);
       $_SESSION['carrinho'] =  $carrinho;
       $_SESSION['totalvalor'] = $totalvalorcarrinho;
       $_SESSION['totalitem'] = $totalitenscarrinho ; 
		
  } else {
      $carrinho =  new Carrinho();
    
      $carrinho->addItens($item);
      $totalitenscarrinho = $carrinho -> CalcularTotalItens();
      $totalvalorcarrinho = $carrinho -> CalcularTotal();
      $carrinho->settotalitens($totalitenscarrinho);
      $carrinho->settotalvalor($totalvalorcarrinho);
		
       $_SESSION['carrinho'] =  $carrinho;
       $_SESSION['totalvalor'] = $totalvalorcarrinho;
       $_SESSION['totalitem'] = $totalitenscarrinho ; 
  }
    if(isset($_SESSION['tel'])){
    $tel = $_SESSION['tel'];
   // echo 'telefone setado : ' .$tel ;
  }else {
    $tel ='81-98833-0011';
    $_SESSION['tel']=$tel;
  //  echo 'telefone NAO setado : ' ;
  }
  if(isset($_SESSION['cliente'])){
    $cliente = $_SESSION['cliente'];
  //  echo 'cliente setado : ' .$cliente->getnome();
  }else {
    $cliente = new Cliente();
    $id=22;
    $nomecli='padrão';
    $cliente->setid($id);
    $cliente->setnome($nomecli);
    $_SESSION['cliente']=$cliente;
  //  echo 'cliente NAO setado : ' ;
  }
    if(isset($_SESSION['endereco'])){
    $endereco = $_SESSION['endereco'];
   // echo 'endereco setado : ' .$endereco ;
    $temendereco = $_SESSION['temendereco'];
    // $carrinho->setcliente($cliente);
     $endereco_id = $_SESSION['endereco_id'];
   //  $cliente->setendereco($endereco);
  }else {
    $endereco = new Endereco();
    $id=33;
    $log='rua da fantasia';
    $cid='Recife';
    $num='288';
    $cepaux='54420-450';
    $endereco->setid($id);
    $endereco->setlogradouro($log);
    $endereco->setcidade($cid);
    $endereco->setnumero($num);
    $endereco->setcep($cepaux);
    $cliente->setendereco($endereco);
    $_SESSION['endereco']=$endereco;
    $_SESSION['endereco_id'] = 0;
   // echo 'endereco NAO setado : ' ;
      $temendereco = false;
      $_SESSION['temendereco'] = $temendereco;
  }*/
	
	
    $carrinho = $_SESSION["carrinho"];
    $cliente = $_SESSION["cliente"];
    $endereco = $_SESSION["endereco"];
	
    //$carrinho->setcliente($cliente);
  	


  if($carrinho->getid()==null){

    $idcarrinho = $carrinho->guidv4();

      $carrinho->setid($idcarrinho);

  }else {

    $carrinho->setcliente($cliente);


  }
	
	
		
	/*$carrinho = $_SESSION['carrinho'];
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
      $_SESSION['carrinho'] = $carrinho;*/
	
	
  /* $_SESSION['carrinho'] = $carrinho;
  
  $_SESSION['totalitem'] = $totalitenscarrinho;
	
  $_SESSION['totalvalor'] = $totalvalorcarrinho;

  $_SESSION['cliente'] = $cliente;

 $_SESSION['endereco'] = $endereco;*/
	


}

	
 

 //header('Location: https://foodnoww.000webhostapp.com/');

    header('Location: https://foodnow-production.up.railway.app');
    exit();




?>
