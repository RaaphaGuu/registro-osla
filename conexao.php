<?php
// Define as variáveis com os dados do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gaveta";

// Cria uma nova conexão com o banco de dados usando a classe mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem sucedida ou se houve algum erro
if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}
?>
