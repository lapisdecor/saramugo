<?php

// liga-se ao mysql
$mysqli = mysqli_connect("127.0.0.1", "root", $password);
if (mysqli_connect_errno($mysqli)) {
    echo "Falha ao ligar-se ao MySql: " . mysqli_connect_error();
}
echo $mysqli->host_info . "\n";

// cria a base de dados
if (!$mysqli->query("CREATE DATABASE saramugo")) {
  echo "Falha ao criar a base de dados: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
  echo "Base de dados criada!";
}

// usa a base de dados e cria a tabela clientes
if (!$mysqli->query("USE saramugo") || (!$mysqli->query("CREATE TABLE clientes"))) {
  echo "Falha ao criar a tabela clientes: (" . $mysqli->errno . ") " . $mysqli->error;
}

// insere esquema rudimentar de campos na tabela clientes
if (!$mysqli->query("INSERT INTO clientes (Nome, NIF, Email) VALUES ('ClienteDeTeste', 000000000, 'cliente@exemplo.com')")) {
  echo "Falha ao inserir valores de teste: (" . $mysqli->errno . ") " . $mysqli->error;
} else {
  echo "Valores de teste inseridos";
}

// fecha a ligação
$mysqli->close();
 ?>
