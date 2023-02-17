

    <?php 
//include "conexao.php";
/*$servername = "localhost";
$username = "root";
$password = "";
$dbname="cardapio";*/

$servername = "hcontainers-us-west-31.railway.app";
$username = "root";
$password = "lW8y65JQW7StMH5N2aGL";
$dbname="railway";
$porta = 7488;

// Create connection
$conn = mysqli_connect($servername, $username,$password,$dbname,$porta);

// Create connection
//$conn = mysqli_connect($servername, $username);
$banco = mysqli_select_db($conn,$dbname);
mysqli_set_charset($conn,'utf8');
// Check connection
if (!$conn) {
  die("Falha na Conexao: " . mysqli_connect_error());
}

$sql = mysqli_query($conn,"select * from produto") or die("Erro");
$sql2 = mysqli_query($conn,"select * from categoria") or die("Erro");


$dadostot = mysqli_num_rows($sql);
$dados2tot = mysqli_num_rows($sql2);


 ?>






 <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Nosso Menu
        </h2>
      </div>







      <ul class="filters_menu">
        <li class="active" data-filter="*">Todos</li>

<?php

 while($dadoscat = mysqli_fetch_assoc($sql2)){
  $id = $dadoscat['id'];
  $ativo = $dadoscat['ativo'];
  $nome = $dadoscat['nome'];
  $foto = $dadoscat['foto'];
  $datareg = $dadoscat['dataregistro'];


?>

        <li data-filter=".<?php echo $nome; ?>"><?php echo $nome; ?></li>
<!--         <li data-filter=".pizza">Pizza</li>
        <li data-filter=".pasta">Pasta</li>
        <li data-filter=".fries">Fries</li> -->
     
      <?php } ?>

      </ul>



      <div class="filters-content">
        <div class="row grid">


          <?php

 while($dados = mysqli_fetch_assoc($sql)){
  $id = $dados['id'];
  $ativo = $dados['ativo'];
  $nome = $dados['nome'];
  $desc = $dados['descricao'];
  $preco = $dados['preco'];
  $categoria_id = $dados['categoria_id'];
  $datareg = $dados['dataregistro'];
   $foto = $dados['foto'];

  $sqlcat = mysqli_query($conn,"select * from categoria where id = {$categoria_id}") or die("Erro");

while($dadoscat = mysqli_fetch_assoc($sqlcat)){

  $categorianome = $dadoscat['nome'];


}


?>


          <div class="col-sm-6 col-lg-4 all <?php echo $categorianome; ?>">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="images/<?php echo $foto; ?>" alt="">
                </div>
                <div class="detail-box">
                  <h5>
                    <?php echo $nome; ?>
                  </h5>
                  <p>
                  <?php echo $desc; ?>
                  </p>
                  <div class="options">
                    <h6>
                      $<?php echo $preco; ?>
                    </h6>

 <a class="cart_link" href="additemcarrinho.php?idprod=<?php echo $id; ?>&qtd=1">
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                  <g>
                    <g>
                      <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                    </g>
                  </g>
                  <g>
                    <g>
                      <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                    </g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                  <g>
                  </g>
                </svg>
              </a>


                   
                  </div>
                </div>
              </div>
            </div>
          </div>


            <?php } ?>
          
<!--                 </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
<!--       <div class="btn-box">
        <a href="">
          Mais
        </a>
      </div> -->
    </div>
  </section>
