<?php
include "../../entidade/Categoria.php";

session_start();



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


//$id = $_POST["id"];
$ativo = $_POST["ativo"];
$ativo = 1;
$nome = $_POST["nome"];
$foto = $_POST["fotoh"];



InserirCategoria($ativo,$nome,$foto,$conn);


 function InserirCategoria($ativo,$nome,$foto,$conexao){
  $conn = $conexao;

$sql = "INSERT INTO categoria (id, ativo, nome, foto,dataregistro)
VALUES ( '$ativo', '$nome', '$foto' , now())";




$result = pg_query($conn, $sql);
$row = pg_num_rows($result);
$categoria = pg_fetch_assoc($result);

echo 'caategoria' .$categoria;

  pg_close($conn);

   header("Location: http://foodnow.com/adm/categoria/categoria.php");
   exit();

}





 function ListarCategorias($conexao){
  $conn = $conexao;

$sql = "SELECT * FROM categoria";

if (pg_query($conn, $sql)) {
  echo "Registros listados categoria  com sucesso";


} else {
  echo "Error ao listar: " . $sql . "<br>" . pg_connection_status($conn);
}



}

/*
INSERT INTO `paciente` (`id`, `ativo`, `nome`, `datanascimento`, `foto`, `email`, `telefone`, `psicologo_id`, `dataregistro`) VALUES (NULL, '1', 'julia maria', '2022-09-21 12:59:57.000000', 'julia.png', 'julia@hotmail.com', '87-98769-6455', '1', CURRENT_TIMESTAMP)*/

/*$sql2 = "INSERT INTO psicologo (id, ativo, nome, datanascimento, foto, email, telefone,dataregistro)
VALUES (NULL,'1', 'WILL','1982-03-26 09:10:07.000000','WILL.jpg' , 'WILL@example.com','8198777-5544',CURRENT_TIMESTAMP)";

if (mysqli_query($conn, $sql2)) {
  echo "Registro psicologo incluido com sucesso";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

pg_close($conn);
?>