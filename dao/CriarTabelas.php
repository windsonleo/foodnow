<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cardapio";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Falha na Conexão: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE usuario (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
nome VARCHAR(50) NOT NULL,
foto VARCHAR(50),
email VARCHAR(50),
senha VARCHAR(50),
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE = InnoDB";

if (mysqli_query($conn, $sql)) {
  echo "Tabela usuario Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela usuario: " . mysqli_error($conn);
}


// sql to create table
$sql2 = "CREATE TABLE empresa (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
nome VARCHAR(50) NOT NULL,
logo VARCHAR(50),
email VARCHAR(50),
telefone VARCHAR(50),
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE = InnoDB";


if (mysqli_query($conn, $sql2)) {
  echo "Tabela empresa Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela empresa: " . mysqli_error($conn);
}

/*
$sql3 = "CREATE TABLE consulta (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
paciente_id INT(6) NOT NULL,
FOREIGN KEY my_fk_pac (paciente_id) REFERENCES paciente(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
dataconsulta DATE,
horaconsulta TIME ,
psicologo_id INT(6) NOT NULL,
status VARCHAR(50),
servico_id INT(6)  NULL,
 FOREIGN KEY my_fk_serv (servico_id) REFERENCES servico(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
 FOREIGN KEY my_fk_ps (psicologo_id) REFERENCES psicologo(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if (mysqli_query($conn, $sql3)) {
  echo "Tabela consulta Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela consulta: " . mysqli_error($conn);
}*/


/*$sql11 = "CREATE TABLE usuario (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
nome VARCHAR(50) NOT NULL,
foto VARCHAR(50),
email VARCHAR(50),
senha VARCHAR(50),
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE = InnoDB";


if (mysqli_query($conn, $sql11)) {
  echo "Tabela usuario Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela usuario: " . mysqli_error($conn);
}*/


$sql4 = "CREATE TABLE categoria (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
nome VARCHAR(50) NOT NULL,
foto VARCHAR(50),
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql4)) {
  echo "Tabela categoria Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela categoria: " . mysqli_error($conn);
}


// sql to create table
$sql3 = "CREATE TABLE produto (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
nome VARCHAR(50) NOT NULL,
datanascimento DATE ,
foto VARCHAR(50),
descricao VARCHAR(50),
preco VARCHAR(50),
categoria_id INT(6),
 FOREIGN KEY my_fk (categoria_id) REFERENCES categoria(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if (mysqli_query($conn, $sql3)) {
  echo "Tabela produto Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela produto: " . mysqli_error($conn);
}


// sql to create table
$sql7 = "CREATE TABLE cliente (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
nome VARCHAR(100) ,
email VARCHAR(50) ,
telefone VARCHAR(50),
datanascimento DATE ,
endereco_id int(6),
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
//)ENGINE = InnoDB";


if (mysqli_query($conn, $sql7)) {
  echo "Tabela cliente Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela cliente: " . mysqli_error($conn);
}





// sql to create table
$sql5 = "CREATE TABLE endereco (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
cliente_id INT(6) NOT NULL,
logradouro VARCHAR(50) ,
uf VARCHAR(50) ,
cidade VARCHAR(50),
bairro VARCHAR(50) ,
cep VARCHAR(50),
numero VARCHAR(50) ,
complemento VARCHAR(50),

 FOREIGN KEY my_fk_cli_end (cliente_id) REFERENCES cliente(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if (mysqli_query($conn, $sql5)) {
  echo "Tabela endereco Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela endereco: " . mysqli_error($conn);
}


// sql to create table
$sql9 = "ALTER TABLE cliente ADD FOREIGN KEY (endereco_id) REFERENCES endereco (id) ON DELETE NO ACTION ON UPDATE NO ACTION;";


if (mysqli_query($conn, $sql9)) {
  echo "RELACAO CLIENTE endereco Criada com Sucesso <br />";
} else {
  echo "Error ao Criar RELACAO CLIENTE endereco: " . mysqli_error($conn);
}



// sql to create table
$sql6 = "CREATE TABLE pedido (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
cliente_id INT(6) NOT NULL,
valortotal VARCHAR(50) ,
valorpago VARCHAR(50) ,
status VARCHAR(50),
endereco_id INT(6) NOT NULL,
foientregue BOOLEAN,
foipago BOOLEAN,
formapagamento VARCHAR(50),
 FOREIGN KEY my_fk_cli (cliente_id) REFERENCES cliente(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
 FOREIGN KEY my_fk_end (endereco_id) REFERENCES endereco(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if (mysqli_query($conn, $sql6)) {
  echo "Tabela pedido Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela pedido: " . mysqli_error($conn);
}


// sql to create table
$sql6 = "CREATE TABLE item (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
ativo  BOOLEAN NOT NULL,
produto_id INT(6) NOT NULL,
nome VARCHAR(50) ,
preco VARCHAR(50) ,
foto VARCHAR(50),
qtd VARCHAR(50),
obs VARCHAR(50),
pedido_id INT(6) NOT NULL,
 FOREIGN KEY my_fk_prod (produto_id) REFERENCES produto(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
 FOREIGN KEY my_fk_ped (pedido_id) REFERENCES pedido(id) ON UPDATE NO ACTION ON DELETE NO ACTION,
dataregistro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";


if (mysqli_query($conn, $sql6)) {
  echo "Tabela item Criada com Sucesso <br />";
} else {
  echo "Error ao Criar Tabela item: " . mysqli_error($conn);
}






mysqli_close($conn);
?>