<?php 
	
try {
    $conexao = new PDO("mysql:host=localhost; dbname=bd_drsaude", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}
 ?>
 <?php
	//starta a sessão
    session_start();
	ob_start();
	//resgata os valores das session em variaveis
	$id_users = isset($_SESSION['id_users']) ? $_SESSION['id_users']: "";	
	$nome_user = isset($_SESSION['nome']) ? $_SESSION['nome']: "";	
	$email_users = isset($_SESSION['email']) ? $_SESSION['email']: "";	
	$pass_users = isset($_SESSION['pass']) ? $_SESSION['pass']: "";	
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";	
	//varificamos e a var logado contém o valos (S) OU (N), se conter N quer dizer que a pessoa não fez o login corretamente
	//que no caso satisfará nossa condição no if e a pessoa sera redirecionada para a tela de login novamente
	if ($logado == "N" && $id_users == ""){	    
		echo  "<script type='text/javascript'>
					location.href='index.php'
				</script>";	
		exit();
	}
?>





<!DOCTYPE html>
<html>
<head>
<title>Home - Dr. Saúde</title>
<meta charset="UTF-8">
<link rel="stylesheet"  type="text/css" href="../css/home.css" />
<script type="text/java" href="../js/button.js"></script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
</head>

<body>

<button class="button1">Criar Nova Consulta</button>

<div class="wrapper">

  <div class="header">
	<img align="left" vspace="35px" hspace="15px" src="..\images\drSaudeLogo.png"/>
  </div>
  
  <div class="topnav">
  <a href="#" style="float:right">Contato</a>
  <a href="#" style="float:right">Sobre</a>
  <a href="I_Home.php" style="float:right">Pagina Inicial</a>
</div>
  
  <div class="main">
	<div class="box sidebar">
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Consultas</h3></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarConsultas.php">Consultar</a></div> 
	</div>
   </div>

    <div class="box content">
	
		<table border="1" width="100%">
    <tr>
        <th>Data e Hora da Consulta</th>
		<th>Paciente</th>
		<th>Medico</th>
		<th>Clínica</th>
		<th>Agendada em:</th>
    </tr>
	
<?php
try {
 
    $stmt = $conexao->prepare("SELECT * FROM agenda");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->dt_consulta."</td>
					<td>".$rs->paciente_a."</td>
					<td>".$rs->medico_a. "</td>
					<td>".$rs->clinica_a. "</td>
					<td>".$rs->dt_agendamento. "</td>";
                echo "</tr>";
            }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}

?>





</table>
	
	
	
	
	
	
	
	
	
	</div>
	
	
  </div>
  <div class="footer"></div>
	</div>


</body>
</html>