<?php


session_start();


if(empty($_POST['nome']) || empty($_POST['senha'])) {
    header("Location: http://cardapio.com/");
    exit();
}


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


$id = $_POST["id"];
$ativo = $_POST["ativo"];
$ativo = 1;
$nome = $_POST["nome"];
$foto = $_POST["foto"];
$email = $_POST["email"];
$senha = $_POST["senha"];


ConsultarUsuario($nome,$senha,$conn);


 function ConsultarUsuario($nome,$senha,$conexao){
  $conn = $conexao;

$sql = "SELECT * FROM usuario WHERE usuario.nome= '$nome' AND usuario.senha='$senha' ";

/*if (mysqli_query($conn, $sql)) {
  echo "Registro usuario Consultado com sucesso";
  mysqli_close($conn);
   header("Location: http://cardapio.com/adm.php");
   exit();

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);
$usuario = $result->fetch_assoc();

if($row == 1) {
    $_SESSION['usuario_nome'] = $usuario['nome'];
    $_SESSION['usuario_foto'] = $usuario['foto'];
    header('Location: http://foodnow.com/adm/adm.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}



}



/* function ListarUsuarios($conexao){
  $conn = $conexao;

$sql = "SELECT * FROM usuario";

if (mysqli_query($conn, $sql)) {
  echo "Registros listados usuario  com sucesso";


} else {
  echo "Error ao listar: " . $sql . "<br>" . mysqli_error($conn);
}



}*/

/*
INSERT INTO `paciente` (`id`, `ativo`, `nome`, `datanascimento`, `foto`, `email`, `telefone`, `psicologo_id`, `dataregistro`) VALUES (NULL, '1', 'julia maria', '2022-09-21 12:59:57.000000', 'julia.png', 'julia@hotmail.com', '87-98769-6455', '1', CURRENT_TIMESTAMP)*/

/*$sql2 = "INSERT INTO psicologo (id, ativo, nome, datanascimento, foto, email, telefone,dataregistro)
VALUES (NULL,'1', 'WILL','1982-03-26 09:10:07.000000','WILL.jpg' , 'WILL@example.com','8198777-5544',CURRENT_TIMESTAMP)";

if (mysqli_query($conn, $sql2)) {
  echo "Registro psicologo incluido com sucesso";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}*/

mysqli_close($conn);
?>