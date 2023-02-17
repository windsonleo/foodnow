<?php
// Iniciando uma sessão

  include "../entidade/Endereco.php";
  include "../entidade/Carrinho.php";
  include "../entidade/Item.php";
  include "../entidade/Cliente.php";

session_start();
 
// Guardando dados na sessão
$carrinho = $_SESSION["carrinho"];
$cliente = $_SESSION["cliente"] ;


?>



<!DOCTYPE html>



<html>



<?php



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




if(isset($_SESSION['carrinho'])){



     $carrinho = $_SESSION['carrinho'];
     $totalitenscarrinho = $_SESSION['totalitem'];
     $cliente=$_SESSION['cliente'];
     $totalvalorcarrinho = $_SESSION['totalvalor'];

  } else {



     $carrinho =  new Carrinho();
     $_SESSION['carrinho'] =  $carrinho;

     $totalitenscarrinho = 0 ;

     $_SESSION['totalitem'] = $totalitenscarrinho ;
     
     $cliente= "padrao" ; 
     $_SESSION['cliente'] = $cliente;

     $totalvalorcarrinho = 0.00;
      $_SESSION['totalvalor'] = $totalvalorcarrinho;



  }

  $usuario_nome = $_SESSION['usuario_nome'];


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
  <link rel="shortcut icon" href="../images/favicon.png" type="">

  <title> Adm </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />

</head>

<body>

<?php include '../headersembanneradm.php';?>




<section class="offer_section layout_padding-bottom">

<div class="offer_container">

   <div class="container">

      <div class="heading_container heading_center">
        <h2>
         Adm
        </h2>
      </div>

      <div class="row">


      


      </div>

    </div>


  </div>

</section>



<section class="d-none" >

   <div class="container">

    <div class="row">

        <div class="col-md-12 ">


           <div class="box">

              <ul class="navbar sacola" style="list-style: none;">
              <li class="">
                <a class="" href="../carrinho.php" >
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
                <a class="" href="../finalizasessao.php">Limpar


<!--              <i class="fa fa-map-marker">


              </i> -->

                </a>
              </li>

              <li class="btn-box" style="border: 1px solid black;padding: 5px; border-radius: 15px;">
                <a class="" href="../finalizapedido.php">Finalizar</a>
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




  <?php include '../footer.php';?>



  <!-- jQery -->
  <script src="../js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="../js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="../js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>




</body>


</html>