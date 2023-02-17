<?php

session_start();




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardapio";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$telefone = $_POST['telefone'];

$sql = "SELECT * FROM cliente where telefone=" ."'" .$telefone ." ';";

    echo "sql" .$sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " .$row["id"]. " - Name: " .$row["nome"]. " Ativo" .$row["ativo"]."End".$row["endereco_id"]."tel" .$row["telefone"] ."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>