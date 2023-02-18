<?php
  include "entidade/Carrinho.php";
  include "entidade/Item.php";
  include "entidade/Cliente.php";
  include "entidade/Endereco.php";
   session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["carrinho"]) || !isset($_SESSION["cliente"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: https://foodnow-production.up.railway.app/carrinho.php");
exit;
}

?>

<!DOCTYPE html>



<html>

<?php

 // include "entidade/Carrinho.php";

$nomeempresa = "Teste";
$segmentoempresa = "Comida Japonesa";
$mktempresa = "restaurante com um saboroso e variado cardápio com receitas exclusivas. Um ambiente descontraído com um cardápio especial de tira-gostos e petiscos. E você ainda pode contar com um Playground climatizado para diversão da garotada com toda a segurança.";

$mktempresa2 = "faz parte da rotina de quem procura além de pratos deliciosos, um espaço amplo e bom atendimento. Contamos com serviço de Self Service aberto de Domingo a domingo com um Buffet variado. Além dos pratos de alto padrão que estão inclusos no cardápio.";

$mktempresa3 = "Na casa também oferecemos pratos orientais, você vai encontrar um cardápio variado e completo desde sushis, temakis e combos. Perfeito para reunir os amigos para um ou uma confraternização em casa.Perfeito para reunir os amigos para um ou uma confraternização em casa.";

$horarioempresa = "12:00 ás 22:00hs";

$enderecoempresa = "Bernardo Vieira de melo 5000";

$telefoneempresa = "+55 98767-6654";

$emailempresa = "teste@teste";

$sugestaoprato ="Os rolos de sushi da terra arrendada do chopstick ajustaram com salmão e queijo de creme e o Cubcumber no fim preto da placa da ardósia acima. Uramaki, Nori Maki ou futomaki sushi com filetes de truta, molho de soja e wasabi";

$sugestao = "sugestao22.png";


$ofertanome1 = "Coca-Cola Lt";

$oferta1img = "coca.png";

$oferta1desconto = "10";


$ofertanome2 = "Brigadeiro";

$oferta2img = "brigadeiro.png";

$oferta2desconto = "15";


$ofertanome3 = "Nhoq";

$oferta3img = "nhoq.png";

$oferta3desconto = "20";




if(isset($_SESSION['carrinho'])) {



     $carrinho = $_SESSION['carrinho'];
     $totalitenscarrinho = $_SESSION['totalitem'];
     $totalvalorcarrinho = $_SESSION['totalvalor'];



  } else {


      $carrinho =  new Carrinho();
    
     $totalitenscarrinho = 0 ;

     $totalvalorcarrinho = 0.00;


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
     $cliente->setendereco($endereco);


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
   // $_SESSION['endereco_id'] = 0;
   // echo 'endereco NAO setado : ' ;
      $temendereco = false;

      $_SESSION['temendereco'] = $temendereco;


  }



?>










<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Finalizar Pedido Step </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>



<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>


<body>




<?php include 'headersembannerclientepesquisar.php';?>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $cepconsulta = $_POST['cepconsulta'];
    if (empty($cepconsulta)) {
        echo "cepconsulta is empty";

        $cep='00000-000';
        $logradouro='ssssss';
        $bairro='bbbbbbb';
        $localidade='lllllllll';
        $uf='ufffffff';
    

    } else {
      $endereco = get_endereco($cepconsulta);
      $cep=$endereco->cep;
      $logradouro=$endereco->logradouro;
      $bairro=$endereco->bairro;
      $localidade= $endereco->localidade;
      $uf=$endereco->uf;
       // echo $cepconsulta;
    }
}else {

        $cep='';
        $logradouro='Digite sua Rua';
        $bairro='Digite seu Bairro';
        $localidade='Digite sua Cidade';
        $uf='Digite seu Estado';


}

?>




<!-- <script type="text/javascript">
 

  function ValidarEndereco() {
        var numero = document.getElementById("staticnumero").value;
        
        if((numero == '') || (numero == null)) {
            alert("Preencha o numero do endereço!");

            document.getElementById("btvalidarendereco").disabled = false;
            document.getElementById("btnfinalizarpedido").disabled = true;
            document.getElementById("staticcomplemento").disabled = false; 
        }

        else {
           // document.getElementById("formulario").submit();

        	alert("validou o numero");
        	document.getElementById("btvalidarendereco").disabled = true;
        	document.getElementById("staticcomplemento").disabled = true; 
        	document.getElementById("staticnumero").disabled = true;

        }   
    }



      function ValidarFormaPagamento() {
        var numero = document.getElementById("staticnumero").value;

        var evalido = false;
       // var formapag = document.getElementById("time_fin").value;
       
    var radios = document.getElementsByName("customRadio");
    for (var i = 0; i < radios.length; i++) {
        if ((radios[i].checked) && (document.getElementById("btvalidarendereco").disabled = true)) {
            console.log("Escolheu: " + radios[i].value);
        document.getElementById("btnvalidarpagamento").disabled = true;
		document.getElementById("btnfinalizarpedido").disabled = false;
		document.getElementById("statictroco").disabled = true;

		

        alert("validou o pagamento");

        evalido=true;

        return

        }else{
        	evalido=false;

		document.getElementById("btnvalidarpagamento").disabled = false;
		document.getElementById("btnfinalizarpedido").disabled = true;
		document.getElementById("statictroco").disabled = false;
		 //alert("nao validou o pagamento ou o endereço");

        }
    }

    };


          function FinalizarPedido() {
        
	alert("finalizando o pedido");
    };

</script> -->



<section class="offer_section layout_padding-bottom">

<div class="offer_container">

   <div class="container">

   	  <div class="heading_container heading_center">
<!--         <h2>
         eNDEREÇO
        </h2> -->



      </div>

	    <div class="row">

           <div class="col-md-12">

    <div class="card">
 
        <div class="card-header  bg-success text-white text-center">DADOS DO ENDEREÇO</div>
    <!-- <p class="card-text">dados do seu carrinho.</p> -->
  
      <div class="card-body">


 <form action="salvardadosnopedido.php" method="POST" id="regForm" >

<div class="tab"> Dados do Endereço
           <p>
                <input type="text" name="cep"readonly class="form-control-plaintext" id="staticcep" value="<?php echo $cep; ?>" placeholder="Cep..." oninput="this.className = ''" >

                </p> 
 

                <p>
              <input type="text" readonly class="form-control-plaintext" id="staticlog" value="<?php echo $logradouro; ?>" placeholder="Rua..." oninput="this.className = ''" name="logradouro">

                </p>

                               <p>
                <input type="text"  placeholder="Digite o Numero" class="form-control-plaintext" id="staticnumero" value="" required  oninput="this.className = ''" name="numero">

                </p>

                                <p>
              <input type="text"  class="form-control-plaintext" id="staticbairro" value="<?php echo $bairro; ?>" placeholder="Bairro..." oninput="this.className = ''" name="bairro">

                </p>

                         <p>
                 <input type="text" readonly  class="form-control-plaintext" id="staticuf" value="<?php echo $uf; ?>" placeholder="UF..." oninput="this.className = ''" name="uf">

                </p>




                <p>
                 <input type="text"  class="form-control-plaintext" id="staticlocalidade" value="<?php echo $localidade; ?>" placeholder="Cidade..." oninput="this.className = ''" name="localidade">

                </p>

                <p>

               <input type="text"  placeholder="Digite o Complemento" class="form-control-plaintext" id="staticcomplemento" value="" name="complemento">
                </p>


    </div>

    <div class="tab"> Dados do Cliente 

       <div class="form-group row">
<!--           <label for="id" class="col-sm-2 col-form-label">id</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control-plaintext" id="id" value="<?php echo $cliente->getid(); ?>" name="id">
          </div> -->
        

        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-2">
            <input type="text"  placeholder="Digite o Nome" class="form-control-plaintext" id="nome" value="<?php echo $cliente->getnome(); ?>" required oninput="this.className = ''" name="nome">
          </div>


                  <label for="email" class="col-sm-2 col-form-label">email</label>
          <div class="col-sm-2">
            <input type="text"   class="form-control-plaintext" id="email" value="<?php echo $cliente->getemail(); ?>" placeholder="email..." oninput="this.className = ''" name="email">
          </div>


        </div>

       <div class="form-group row">
          <label for="telefone" class="col-sm-4 col-form-label">telefone</label>
          <div class="col-sm-8">
            <input type="text"  class="form-control-plaintext" id="telefone" value="<?php echo $cliente->gettelefone(); ?>" placeholder="telefone..." oninput="this.className = ''" name="telefone">
          </div>

      </div>


      <div class="form-group row">
          <label for="datanascimento" class="col-sm-2 col-form-label">datanascimento</label>
          <div class="col-sm-2">
            <input type="text"  class="form-control-plaintext" id="datanascimento" value="<?php echo $cliente->getdatanascimento(); ?>" placeholder="datanascimento..." oninput="this.className = ''" name="datanascimento">
          </div>
        <label for="endereco" class="col-sm-2 col-form-label">endereco</label>
          <div class="col-sm-6">
            <input type="text"  class="form-control-plaintext" id="endereco" value="<?php echo $cliente->get_endereco(); ?>" placeholder="endereco..." oninput="this.className = ''" name="endereco">
          </div>


      </div>



    </div>




    <div class="tab"> Forma De Pagamento


          <div class="form-group row">

      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input " required value="Dinheiro" >
        <label class="custom-control-label  " for="customRadio1">Dinheiro</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" required value="Credito">
        <label class="custom-control-label  " for="customRadio2">Crédito</label>
      </div>

                <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" required value="Debito">
        <label class="custom-control-label  " for="customRadio4">Débito</label>
      </div>

      <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" required value="Pix">
        <label class="custom-control-label  " for="customRadio3">Pix</label>
        <div class="invalid-feedback">More example invalid feedback text</div>
      </div>



    </div>
      <div class="form-group row">

          <label for="statictroco" class="col-sm-4 col-form-label">Troco</label>
          <div class="col-sm-8">
            <input type="text" placeholder="Digite o troco"  class="form-control-plaintext" name="troco" id="statictroco" value="">
          </div>
    
      </div>



    </div>




      <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Anterior</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Proximo</button>
    </div>
  </div>

      <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
     <span class="step"></span>

  </div>


    </form>





  
</div>


    

 <?php 
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

$telefone = '81-98877-5544';

//$_SESSION['tel'] = $telefone;

$end = $_SESSION['endereco'];

//$cep = $_POST["cep"];


  $sqlcliente = pg_query($conn,"select * from cliente where telefone = {$telefone}") or die("Erro");

while($dadoscli = pg_fetch_assoc($sqlcliente)){

  $id = $dadoscli['id'];
  $nome = $dadoscli['nome'];
  $email = $dadoscli['email'];
  $telefone = $dadoscli['telefone'];
  $enderecoaux = $dadoscli['endereco_id'];
  $pedidos = $dadoscli['arr_pedidos'];
  $ativo = $dadoscli['ativo'];
  $dataregistro = $dadoscli['dataregistro'];
  $datanascimento = $dadoscli['datanascimento'];

  $cliente = new Cliente();
  $cliente->setid($id);
  $cliente->setnome($nome);
  $cliente->setemail($email);
  $cliente->settelefone($telefone);
  $cliente->setendereco($enderecoaux);
  $cliente->setarr_pedidos($pedidos);
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

 // echo var_dump($cliente);

 
}

 // echo var_dump($cliente);

?>

          

  </div>
</div>



   </div>



 <!-- <div class="col-md-6">

	 	<div class="card">
 
    		<div class="card-header  bg-warning text-white text-center">DADOS DA ENTREGA</div>
     <p class="card-text">dados do seu carrinho.</p> 
  
 			<div class="card-body">

            <form action="" method="POST" id="pesquisacep">

<div class="input-group mb-3">
  <input name="cep" type="text" class="form-control col-sm-3" placeholder="Digite o Cep" aria-label="Digite o Cep" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary col-sm-12" type="submit" id="button-addon2">Pesquisar</button>
  </div>
</div>


    </form>

 	 		
 	 		<form action="" method=""> 

			 <div class="form-group row">
			    <label for="staticcep" class="col-sm-2 col-form-label">Cep</label>
			    <div class="col-sm-2">
			      <input type="text" readonly class="form-control-plaintext" id="staticcep" value="<?php echo $cep; ?>">
			    </div>
			  

		    <label for="staticnumero" class="col-sm-2 col-form-label">Nº</label>
			    <div class="col-sm-2">
			      <input type="text" placeholder="Digite o Numero" class="form-control-plaintext" id="staticnumero" value="" required>
			    </div>


			    		    <label for="staticuf" class="col-sm-2 col-form-label">UF</label>
			    <div class="col-sm-2">
			      <input type="text" readonly  class="form-control-plaintext" id="staticuf" value="<?php echo $uf; ?>">
			    </div>


			  </div>

			 <div class="form-group row">
			    <label for="staticlog" class="col-sm-4 col-form-label">Logradouro</label>
			    <div class="col-sm-8">
			      <input type="text" readonly class="form-control-plaintext" id="staticlog" value="<?php echo $logradouro; ?>">
			    </div>

			</div>


			<div class="form-group row">
			    <label for="staticbairro" class="col-sm-2 col-form-label">Bairro</label>
			    <div class="col-sm-4">
			      <input type="text" readonly class="form-control-plaintext" id="staticbairro" value="<?php echo $bairro; ?>">
			    </div>
		    <label for="staticlocalidade" class="col-sm-3 col-form-label">Localidade</label>
			    <div class="col-sm-3">
			      <input type="text" readonly class="form-control-plaintext" id="staticlocalidade" value="<?php echo $localidade; ?>">
			    </div>


			</div>


			<div class="form-group row">
			    <label for="staticcomplemento" class="col-sm-2 col-form-label">Compl.</label>
			    <div class="col-sm-10	">
			      <input type="text" placeholder="Digite o Complemento" class="form-control-plaintext" id="staticcomplemento" value="">
			    </div>

			</div>

			<button id="btvalidarendereco" class="btn btn-primary" type="button" onclick=" ValidarEndereco()">Salvar</button>


 	 		</form>
     			

  </div>
</div>



	 </div> -->



<!--  <div class="col-md-4">

	 	<div class="card">
 
    		<div class="card-header  bg-primary text-white text-center">DADOS DO PAGAMENTO</div>
    <p class="card-text">dados do seu carrinho.</p> 
  
 			<div class="card-body">



 	 		
 	 		<form action="" method=""> 

 	 	<div class="form-group row">

			<div class="custom-control custom-radio custom-control-inline">
			  <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input " required >
			  <label class="custom-control-label  " for="customRadio1">Dinheiro</label>
			</div>
			<div class="custom-control custom-radio custom-control-inline">
			  <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" required>
			  <label class="custom-control-label  " for="customRadio2">Crédito</label>
			</div>

								<div class="custom-control custom-radio custom-control-inline">
			  <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input" required>
			  <label class="custom-control-label  " for="customRadio4">Débito</label>
			</div>

			<div class="custom-control custom-radio custom-control-inline">
			  <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input" required >
			  <label class="custom-control-label  " for="customRadio3">Pix</label>
			  <div class="invalid-feedback">More example invalid feedback text</div>
			</div>



		</div>
			<div class="form-group row">

			    <label for="statictroco" class="col-sm-4 col-form-label">Troco</label>
			    <div class="col-sm-8">
			      <input type="text" placeholder="Digite o troco"  class="form-control-plaintext" id="statictroco" value="">
			    </div>
		
			</div>

              <div class="form-group row">

         

                <button id="btnvalidarpagamento" class="btn btn-primary" type="button" onclick="ValidarFormaPagamento();">Salvar</button>

                 <span class="badge">Total R$: <?php echo $totalvalorcarrinho; ?>  </span>

        </div>



 	 		</form>
     			

  </div>
</div>
			<hr>
		<button id="btnfinalizarpedido" class="btn btn-outline-success btn-lg btn-block" type="button" onclick="FinalizarPedido();" disabled> Finalizar</button>

	 </div> -->






	</div>

<hr>

  <div class="row">
	<div class="table-responsive col-md-12">
		 <table class="table table-bordered table-hover table-sm">
	      	<thead class="">
	        	<tr class="table-warning text-center">

 					<th scope="col" class="d-none">id</th> 
	        		 <th scope="col">foto</th> 
	        		 <th scope="col">nome</th> 
	        		<th  scope="col">qtd </th>
	        		<th  scope="col">preco</th>
	        		<th  scope="col">total</th>
	        		<!-- <th  scope="col">ação</th> -->

	        	</tr>

	     	 </thead>
		      <tbody>


<?php 

$itens = $carrinho->getarr_itens();
//echo $itens;


foreach ($itens as $item) {

$id = $item->getid();
$foto = $item->getfoto();
$nome = $item->getnome();
$qtd = $item->getqtd();
$preco = $item->getpreco();
$total = $preco * $qtd;



?>


	 	      	<tr>

	 	      		<td class="d-none> <?php echo $id; ?> </td>

	 	      		<td class="text-truncate"> <img src="images/<?php echo $foto; ?>"  style="width: 50px;height: auto;" " >  </td>


					<td class="text-truncate"> <?php echo $nome; ?> </td>

		      	

		      		   
					<td class="text-truncate"> <?php echo $qtd; ?> </td>

		   

		      		     
					<td class="text-truncate">R$ =  <?php echo $preco; ?> </td>

		      

		      		 
					<td class="text-truncate">R$ =  <?php echo $total; ?> </td>


<!-- 					<td class="text-truncate"> 
					<a href="addobsitem.php?iditem=<?php echo $id; ?>" class="btn btn-outline-primary btn-sm"> Obs</a> 

 <a href="excluiritem.php?iditem=<?php echo $id; ?>" class="btn btn-outline-danger btn-sm"> excluir</a>

					 </td> -->

					


		      	</tr>

		      <?php } ?>

		      </tbody>
	     </table>

	 </div>
</div>
</div>

</div>

</section>











<section class="fixed-bottom d-none">

   <div class="container">

    <div class="row">

        <div class="col-md-12 ">


           <div class="box">

              <ul class="navbar sacola" style="list-style: none;">
              <li class="">
                <a class="" href="carrinho.php" >
Carrinho
              <i class="fa fa-eye">


              </i>

                
              </a>

              </li>
              <li class="">
                <a class="" href="">Itens : 

<!-- 
             <i class="fa fa-phone">


              </i> -->

              <span class="badge">  <?php echo $totalitenscarrinho; ?>  </span>
                </a>
              </li>

              <li class="">
                <a class="" href="">Valor : 


 <!--             <i class="fa fa-map-marker">


              </i> -->

               <span class="badge"> R$: <?php echo $totalvalorcarrinho; ?>  </span>

                </a>
              </li>

                            <li class="" style="border: 1px solid black; padding: 5px; border-radius: 10px;" >
                <a class="" href="finalizasessao.php">Limpar


<!--              <i class="fa fa-map-marker">


              </i> -->

                </a>
              </li>

              <li class="btn-box" style="border: 1px solid black;padding: 5px; border-radius: 15px;">
                <a class="" href="finalizapedido.php">Finalizar</a>
              </li>
<!--               <li class="nav-item">
                <a class="nav-link" href="book.html">Reservas</a>
              </li> -->
            </ul>

           </div>

        </div>


    </div>


  </div>




  </section>




  <?php include 'footer.php';?>



  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>


  <script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Enviar";
  } else {
    document.getElementById("nextBtn").innerHTML = "Proximo";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>



  </body>

</html>
