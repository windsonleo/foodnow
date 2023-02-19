<?php


session_start();


if(empty($_POST['nome']) || empty($_POST['senha'])) {
    header("https://foodnow-production.up.railway.app/");
    exit();
}


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





$nome = $_POST["nome"];
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
     
     $sqlcliente = pg_query($conn,"SELECT * FROM usuario WHERE usuario.nome= '$nome' AND usuario.senha='$senha' ";) or die("Erro");
while($dadoscli = pg_fetch_assoc($sqlcliente)){
 
  $nome = $dadoscli['nome'];
  $foto = $dadoscli['foto'];

    $row = pg_num_rows($sqlcliente);

if($row == 1) {
    $_SESSION['usuario_nome'] = $usuario['nome'];
    $_SESSION['usuario_foto'] = $usuario['foto'];
    header('Location: https://foodnow-production.up.railway.app/adm/adm.php');
    exit();
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: https://foodnow-production.up.railway.app/');
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

pg_close($conn);
?>
