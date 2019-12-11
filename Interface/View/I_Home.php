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
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
<script type="text/java" href="../js/button.js"></script>
</head>

<body>

<button class="button1">Criar Nova Consulta</button>

<div class="wrapper">
  <div class="header">
	<div>
	<img align="left" vspace="35px" hspace="15px" src="..\images\drSaudeLogo.png"/>
	</div>
	<div>
	<h1><?php echo $nome_user;?> voc&ecirc; est&aacute; logado...</h1>
	<a href="../Controller/logout.php"><input type="button" value="Sair"/></a>
	</div>
  </div>
  
  <div class="topnav">
  <a href="#" style="float:right">Contato</a>
  <a href="#" style="float:right">Sobre</a>
  <a href="I_Home.php" style="float:right">Pagina Inicial</a>
</div>
  
  <div class="main">
	<div class="box sidebar">
		<div class="card1" >
		 <div class="fakeimgtitle"><h3>Funcionários</h3></div>
		  <div class="fakeimg"><a href="..\View\I_CadastrarFuncionarios.php">Cadastrar</a></div>
		  <div class="fakeimg"><a href="..\View\I_ConsultarFuncionarios.php">Relatório</a></div>
		  <div class="fakeimg"><a href="..\View\I_AlterarFuncionarios.php">Alterar/Excluir</a></div>
		</div>
		
		
		<div class="card1" >
		  <div class="fakeimgtitle"><h3>Pacientes</h3></div>
		  <div class="fakeimg"><a href="..\View\I_CadastrarPacientes.php">Cadastrar</a></div>
		  <div class="fakeimg"><a href="..\View\I_ConsultarPacientes.php">Relatório</a></div>
		  <div class="fakeimg"><a href="..\View\I_AlterarPacientes.php">Alterar/Excluir</a></div>
		</div>
		
		
		<div class="card1" >
		  <div class="fakeimgtitle"><h3>Clinicas</h3></div>
		  <div class="fakeimg"><a href="..\View\I_CadastrarClinicas.php">Cadastrar</a></div>
		  <div class="fakeimg"><a href="..\View\I_ConsultarClinicas.php">Relatório</a></div>
		  <div class="fakeimg"><a href="..\View\I_AlterarClinicas.php">Alterar/Excluir</a></div>
		</div>
		
		
		<div class="card1" >
		  <div class="fakeimgtitle"><h3>Consultas</h3></div>
		  <div class="fakeimg"><a href="..\View\I_CadastrarConsultas.php">Cadastrar</a></div>
		  <div class="fakeimg"><a href="..\View\I_ConsultarConsultas.php">Relatório</a></div>
		  <div class="fakeimg"><a href="..\View\I_AlterarConsultas.php">Alterar/Excluir</a></div>	  
		</div>
	</div>
    <div class="box content">


	</div>  	

  </div>
  
  

  <div class="footer"></div>
	</div>


</body>
</html>