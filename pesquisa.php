<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./src/css/estilo-pesquisa.css">
  <title>Document</title>
</head>
<body>
  
<?php
     
// Inclui o arquivo de conexão com o banco de dados
include_once ('conexao.php');
			
// Cria conexao
$conn = new mysqli($servername, $username, $password, $dbname);

// Chaca a conecao
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se os dados do formulário foram enviados
if (isset($_POST["pesquisa"])) {
  // Recebe os dados do formulário e filtra as aspas  

  $ordem = $conn->real_escape_string($_POST["pesquisa"]);


  // Cria a consulta SQL que busca os dados da tabela cadastros
  $sql = "SELECT * FROM cadastros WHERE ordem = '$ordem' ";
//  $sql = "SELECT * FROM cadastros WHERE ordem = '$ordem'";


  // Executa a consulta SQL e armazena o resultado em uma variável
  $result = $conn->query($sql);

  // Verifica se a consulta retornou algum resultado
  if ($result->num_rows > 0) {
    // Cria uma tabela HTML para mostrar os dados encontrados
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>OREDEM DE SERVIÇO</th>";
    echo "<th>Data do registro</th>";
    echo "<th>Cliente</th>";
    echo "<th>Endereço</th>";
    echo "<th>Equipamento</th>";
    echo "<th>Serviço</th>";
  
    echo "<th>Modelo</th>";
    echo "<th>Serie</th>";
       echo "</tr>";
 /*   $nome = $_POST['nome'];
				$endereco = $_POST['endereco'];
			
            $RG = $_POST['RG'];
				$servico = $_POST['servico'];
				$equipamento = $_POST['equipamento'];
				
				$serie = $_POST['serie'];
            $modelo=$_POST['modelo'];
            $data_registro = $_POST['data_registro'];
*/

    // Percorre cada linha do resultado e imprime os dados na tabela
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["ordem"] . "</td>";
      echo "<td>" . $row["data_registro"] . "</td>";
      echo "<td>" . $row["nome"] . "</td>";
      echo "<td>" . $row["endereco"] . "</td>";
      echo "<td>" . $row["equipamento"] . "</td>";
      echo "<td>" . $row["servico"] . "</td>";
     
      echo "<td>" . $row["modelo"] . "</td>";
      echo "<td>" . $row["serie"] . "</td>";
          echo "</tr>";
    }

    // Fecha a tabela HTML
    echo "</table>";
  } else {
    // Caso não haja nenhum resultado, imprime uma mensagem de aviso
    echo "Nenhum dado encontrado!!";
  }
}

// Fecha a conexão com o banco de dados
$conn->close();	  

?>
<a href="cadastro.html"> << Voltar</a> 

</body>
</html>