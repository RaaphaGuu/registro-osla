<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="utf-8">
   <meta name="description" content="php">

   <title>LA MANUTENÇÃO</title>
   <link rel="stylesheet" href="./src/css/oslastyle.css">

</head>

<body>

   <section class="topo">
      <img src="./src/img/logo1.jpeg" alt="right" width="60px" height="60px">
      <h1>ORDEM DE SERVIÇO</h1>

   </section>

   <section class="conteudo">

      <?php
      // Cria variaveis com os valores do formulário

      $nome = $_POST['nome'];
      $endereco = $_POST['endereco'];
      $RG = $_POST['RG'];
      $servico = $_POST['servico'];
      $equipamento = $_POST['equipamento'];
      $serie = $_POST['serie'];
      $modelo = $_POST['modelo'];
      $data_registro = $_POST['data_registro'];


      echo "<table border>";

      $prefixo = "";

      // Gerar um número aleatório de três dígitos
      $sufixo = rand(1000, 9999);

      // Concatenar o prefixo e o sufixo para formar a ordem de serviço
      $ordem = "$prefixo" . $sufixo;

      echo "</table>";
      echo "<table border='1' width='100%'>";

      // Definir os três primeiros dígitos que sempre serão ORC
      echo "<tr>
      <td colspan='4' align='center'><strong><h2> Cadastro do Solicitante:</h2>  <h1>Ordem Nº: $ordem</h1></strong></td>";


      echo "<tr><td><strong>SOLICITANTE:</strong></td><td>$nome</td>
            <td><strong>ENDEREÇO:</strong></td><td>$endereco</td></tr>";
      echo "<tr><td><strong>DOC:</strong></td><td>$RG</td><td><strong>DATA DO CADASTRO:</strong></td><td>$data_registro</td></tr>";
      echo "<tr><td colspan='4' align='center'><strong><h2>Serviço Solicitado:</h2></strong></td></tr>";

      echo "<tr><td><strong>Serviço a ser Realizado:</strong></td><td>$servico</td><td><strong>Número do Chassi:</strong><td>$serie</td></tr></td>";
      echo "<tr><td><strong>Equipamento:</strong></td><td>$equipamento</td><td colspan='3'><strong>OBSERVAÇÃO<strong</td></tr>";

      echo "<tr><td><strong>Modelo:</strong></td><td>$modelo</td>";
      echo "</table>";

      switch ($servico) {

         case 'Roçadeiras a Gasolina':

            echo "";


            break;

         case 'Cortador de Grama a Gasolina ':

            echo "";

            break;

         case 'Cortador de Grama Elétrico':
            echo " ";

            break;

         case 'Motosserra':
            echo "";

         default:

         case 'Outros':
            echo " ";

            break;
      }


      ?>

      <h1>NORMAS DE PROCEDIMENTO.</h1>
      <h3>1 - AUTORIZAÇÃO: Autorizo que se necessário meu equipamento seja desmontado para análise de defeito de orçamento. Caso o conserto não seja autorizado o mesmo poderá não funcionar novamente ou da mesma forma que veio, devido ter sido desmontado para análise. OBS. Todos os produtos descartáveis que estiverem no aparelho/equipamento serão descartados sem aviso prévio para melhor higiene da oficina. Acessórios e condição do produto devem ser conferidos na retirada do aparelho, não nos responsabilizamos após a retirada do produto.</h3>
      <h3> 2 - ORÇAMENTO: O prazo de validade dos valores orçados é de 07 dias contados de apresentação ao cliente. O orçamento perderá automaticamente a sua validade na hipótese de o cliente retirar o produto do serviço autorizado.</h3>
      <h3>3 – GARANTIA: O serviço autorizado garante os serviços prestados, nas mesmas condições da prestação do serviço anterior. A garantia compreende a mão de obra e peças utilizadas pelo prazo de 90 dias, contados de entrega efetiva do produto. A garantia perde sua validade se houver violação do lacre colocado no produto por ocasião do conserto; utilização de rede elétrica impropria; sofra danos causados por acidentes ou agentes da natureza; manutenção inadequada por técnico não autorizado; uso inadequado do produto; combustível improprio; mistura de combustível.</h3>
      <h3> - AUTORIZAÇÃO APÓS 90 DIAS: Dou total e plena autonomia a empresa a escapiar, desmontar, ou até mesmo descartar o produto descrito acima, caso não faça a retirada do mesmo dentro doe 90 dias após a execução do orçamento ou conclusão do serviço.</h3>
      <h3>ATENÇÃO: O bem deixado para conserto que não for retirado no prazo máximo de 15 dias a contar da data de aviso do aparelho/equipamento pronto, será cobrado uma taxa de 3,00 (Três Reais) por dia de armazenagem.</h3>
      <hr>
      <p><strong>Assinatura :</strong> __________________________________________<strong>&nbsp Data:</strong>_____/_____/_____. &nbsp<br><br><strong>Telefone para Contato:</strong>( &nbsp&nbsp )_________-__________<br>
      <h5><span>ORÇAMENTOS NÃO APROVADOS SERÁ COBRADO TAXA DE R$ 25,00</span></h5>
      <?php

      echo "<hr>VIA DO CLIENTE ";
      echo "<p>Ordem Nº: $ordem<p>";
      echo "<h5>Estou ciente de todos os termos de serviço e garantia</h5>";
      echo " <strong>Solicitante:</strong> $nome | <strong>ITEM A SER RETIRADO:</strong> $equipamento &nbsp |<strong>Data da Solicitação:</strong> $data_registro |
                	 	<strong>";
      echo "<strong> SERVIÇO SOLICITADO:</strong> $servico |  IDENTIFICAÇÃO:</strong> <u> $modelo . $serie</div></u>  <br> <br>";

      ?>

      <input type="submit" onclick="window.print()"><br>
      <br>
      
      <a class="btn-principal-registro" href="cadastro.html">
      VOLTAR</a>
   </section>



   <?php
   // Inclui o arquivo de conexão com o banco de dados
   include_once('conexao.php');

   // Cria conexao
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Chaca a conecao
   if ($conn->connect_error) {
      die("Falha na conexão: " . $conn->connect_error);
   }

   $sql = "INSERT INTO	cadastros (nome, endereco, data_registro, RG, servico, equipamento, serie, modelo, ordem) VALUES ('$nome', '$endereco', '$data_registro', '$RG', '$servico', '$equipamento', '$serie', '$modelo' , '$ordem')";

   if ($conn->query($sql) === TRUE) {
      echo "";
   } else {
      echo "Erro: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
   ?>

</body>

</html>