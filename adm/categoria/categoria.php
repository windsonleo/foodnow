<?php
// Iniciando uma sessão

  include "../../entidade/Categoria.php";

session_start();
 

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

 $totalitenscarrinho = $_SESSION['totalitem'];

 $nomefoto='padrao.jpg';

 if(isset($_SESSION['nomefoto'])){

  $nomefoto=$_SESSION['nomefoto'];

 }else {

$_SESSION['nomefoto']=$nomefoto;

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
  <link rel="shortcut icon" href="../../images/favicon.png" type="">

  <title> Categoria </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="../../css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="../../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../../css/responsive.css" rel="stylesheet" />

</head>

<body>


<?php include '../../headersembanneradm.php';?>




<section class="offer_section layout_padding-bottom">

<div class="offer_container">

   <div class="container">



    <div class="row">

<form id="formulario" action="../../dao/categoria/uploader.php" method="POST" enctype="multipart/form-data">

<div class="form-row">
    <div class="col-md-8 mb-4">
      <label for="validationCustom03">Foto</label>
  
<div class="custom-file">
      <input type="file" name="foto" class="form-control custom-file-input" id="validationCustom03" placeholder="foto" required>
  <label class="custom-file-label" for="customFileLang">Selecionar Arquivo</label>
</div>

      <div class="invalid-feedback">
        Please provide a foto.
      </div>
    </div>


    <div id="visualizar"class="media"> </div>


  </div>

</form>


    </div>

   

      <div class="row">

<form class="needs-validation" novalidate action="../../dao/categoria/CategoriaDao.php" method="POST">
  




  <div class="form-row">
   

    <div class="col-md-2 mb-1">
      <label for="validationCustom02">Id</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="id" value="" required name="id" disabled>
      <div class="valid-feedback">
       ótimo!
      </div>
    </div>

           <div class="col-md-4 mb-4">
     
      <div class="input-group">
     <div class="custom-control custom-checkbox">
  <input type="checkbox"name="ativo" class="custom-control-input" id="customCheck1">
   <label class="custom-control-label" for="customCheck1">Ativo</label> 
</div>
        <div class="invalid-feedback">
          Please choose a ativo.
        </div>
      </div>
    </div>

  </div>

    <div class="form-row">

    <div class="col-md-6 mb-6">
      <label for="validationCustom01">Nome </label>
      <input type="text" name="nome" class="form-control" id="validationCustom01" placeholder="Nome da Categoria" value="" required>
      <div class="valid-feedback">
        ótimo!
      </div>
    </div>

 </div>
  
  <div class="form-row">
    <div class="col-md-8 mb-5">
      <label for="hh">Foto</label>
  
<div class="custom-control">
      <input type="text" name="fotoh" value="<?php echo $nomefoto; ?>" class="form-control" id="fotoh" placeholder="foto" required>
  <label class="custom-control-label" for="customFileLang">Selecionar Arquivo</label>
</div>

      <div class="invalid-feedback">
        Please provide a foto.
      </div>
    </div>


   


  </div>

  <button class="btn btn-primary" type="submit">Enviar</button>

</div>
</form>


      


      </div>

    </div>


  </div>

</section>








  <?php include '../../footer.php';?>



  <!-- jQery -->
  <script src="../../js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="../../js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="../../js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>

  <script type="text/javascript" src="../../js/core/jquery.min.js"></script>
<script type="text/javascript" src="../../js/core/jquery.form.js"></script>

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>


       <script type="text/javascript">
$(document).ready(function(){
     /* #imagem é o id do input, ao alterar o conteudo do input execurará a função baixo */
     $('#validationCustom03').on('change',function(){
         $('#visualizar').html('<img src="ajax-loader.gif" alt="Enviando..." /> Enviando...');
        /* Efetua o Upload sem dar refresh na pagina */           $('#formulario').ajaxForm({
            target:'#visualizar' // o callback será no elemento com o id #visualizar
         }).submit();
     });
 })
</script>


</body>


</html>