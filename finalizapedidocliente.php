
<?php

  include "entidade/Carrinho.php";
  include "entidade/Item.php";
   include "entidade/Cliente.php";
  include "entidade/Endereco.php";
 

// Inicia sessões
session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["carrinho"]) || !isset($_SESSION["cliente"]))
{
// Usuário não logado! Redireciona para a página de login
header("Location: http://foodnow.com/");
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
    $_SESSION['endereco_id'] = 0;
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

  <title> Finalizar Pedido Cliente </title>

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

<body>

	<?php

function get_endereco($cep){


  // formatar o cep removendo caracteres nao numericos
  $cep = preg_replace("/[^0-9]/", "", $cep);
  $url = "http://viacep.com.br/ws/$cep/xml/";

  $xml = simplexml_load_file($url);
  return $xml;
}

?>



<?php include 'headersembannerclientepesquisar.php';?>


<!-- <form action="" method="post">
  <input type="text" name="cep">
  <button type="submit">Pesquisar Endereço</button>
</form> -->


<!-- <?php if($_POST['cep']){ ?>
<!-- <h2>Resultado da Pesquisa</h2> -->
<!-- <p>
  <?php $endereco = get_endereco( $_POST['cep']); ?>
  <b>CEP: </b> <?php echo $endereco->cep; ?><br>
  <b>Logradouro: </b> <?php echo $endereco->logradouro; ?><br>
  <b>Bairro: </b> <?php echo $endereco->bairro; ?><br>
  <b>Localidade: </b> <?php echo $endereco->localidade; ?><br>
  <b>UF: </b> <?php echo $endereco->uf; ?><br>
</p> -->


 <?php
$cep=$endereco->cep;
$logradouro=$endereco->logradouro;
$bairro=$endereco->bairro;
$localidade= $endereco->localidade;
$uf=$endereco->uf;

?>

<?php } ?>  -->


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


<!-- <p><?php echo var_dump($carrinho); ?>"</p> -->

<!--  <p> endereco_id : <?php echo var_dump($endereco_id); ?>"</p>
 <p> endereco : <?php echo var_dump($endereco); ?>"</p> -->
<!--  <p> cliente : <?php echo var_dump($cliente); ?>"</p>
  <p> tem endereco : <?php echo var_dump($temendereco); ?>"</p>  -->

 <!-- <p> telefone : <?php echo var_dump($tel); ?>"</p> -->

 

<!--<p> cliente : <?php echo var_dump($cliente); ?>"</p>
<p> carrinho : <?php echo var_dump($carrinho); ?>"</p> -->

      </div>

	    <div class="row">

           <div class="col-md-12">

    <div class="card">
 
        <div class="card-header  bg-success text-white text-center">DADOS DO CLIENTE</div>
    <!-- <p class="card-text">dados do seu carrinho.</p> -->
  
      <div class="card-body">

            <form action="pesquisarcliente.php" method="POST">

<div class="input-group mb-3">
  <input name="telefone" type="text" class="form-control col-sm-3" placeholder="Digite o Telefone" aria-label="Digite o Telefone" aria-describedby="button-addon3">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary col-sm-12" type="submit" id="button-addon3">Localizar</button>
  </div>
</div>


    </form>

 <?php 
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


//$telefone = $_POST["telefone"];

$telefone = '81-98877-5544';

//$_SESSION['tel'] = $telefone;

$end = $_SESSION['endereco'];

//$cep = $_POST["cep"];


  $sqlcliente = mysqli_query($conn,"select * from cliente where telefone = {$telefone}") or die("Erro");

while($dadoscli = mysqli_fetch_assoc($sqlcliente)){

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

  echo var_dump($cliente);

 
}

 // echo var_dump($cliente);

?>

      
      <form action="salvarclientenopedido.php" method="POST"> 

       <div class="form-group row">
          <label for="id" class="col-sm-2 col-form-label">id</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control-plaintext" id="id" value="<?php echo $cliente->getid(); ?>">
          </div>
        

        <label for="nome" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-2">
            <input type="text" readonly placeholder="Digite o Nome" class="form-control-plaintext" id="nome" value="<?php echo $cliente->getnome(); ?>" required>
          </div>


                  <label for="email" class="col-sm-2 col-form-label">email</label>
          <div class="col-sm-2">
            <input type="text" readonly  class="form-control-plaintext" id="email" value="<?php echo $cliente->getemail(); ?>">
          </div>


        </div>

       <div class="form-group row">
          <label for="telefone" class="col-sm-4 col-form-label">telefone</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control-plaintext" id="telefone" value="<?php echo $cliente->gettelefone(); ?>">
          </div>

      </div>


      <div class="form-group row">
          <label for="datanascimento" class="col-sm-2 col-form-label">datanascimento</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control-plaintext" id="datanascimento" value="<?php echo $cliente->getdatanascimento(); ?>">
          </div>
        <label for="endereco" class="col-sm-2 col-form-label">endereco</label>
          <div class="col-sm-6">
            <input type="text" readonly class="form-control-plaintext" id="endereco" value="<?php echo $cliente->get_endereco(); ?>">
          </div>


      </div>



      <button id="btvalidarcliente" class="btn btn-primary" type="submit" >Salvar</button>


      </form>
          

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



  </body>

</html>
