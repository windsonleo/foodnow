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


 function ConsultarUsuario($nome,$senha,$conexao) {
  $conn = $conexao;

$sql = "SELECT * FROM usuario WHERE usuario.nome= '$nome' AND usuario.senha='$senha' ";


     
     $sqlcliente = pg_query($conn,"SELECT * FROM usuario WHERE usuario.nome= '$nome' AND usuario.senha='$senha' ") or die("Erro");
while($dadoscli = pg_fetch_assoc($sqlcliente)){
 
  $nome = $dadoscli['nome'];
  $foto = $dadoscli['foto'];
    $usuario->setnome($nome);
    $usuario->setfoto($foto);
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

    
 }

 pg_close($conn);

?>
