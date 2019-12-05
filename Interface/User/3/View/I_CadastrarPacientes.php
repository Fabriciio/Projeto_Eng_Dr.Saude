<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_CadastrarFuncionarios.php" class="close" data-dismiss="alert">&times</a>
						Paciente cadastrado com sucesso.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="index.php" class="close" data-dismiss="alert">&times</a>
						Erro ao cadastrar paciente.
					</div>
				</div>
			<?php
			break;
		}
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
      <div class="fakeimgtitle"><h3>Funcionários</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarFuncionarios.php">Cadastrar</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Pacientes</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarPacientes.php">Cadastrar</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Clinicas</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarClinicas.php">Cadastrar</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Consultas</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarConsultas.php">Cadastrar</a></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarConsultas.php">Consultar</a></div>	  
	</div>
   </div>

    <div class="box content">
	
	<form action="../Controller/CadastrarPaciente.php" method="POST">
						<div class="form-group row">
							<label for="cpf_p" class="col-sm-2 col-form-label">CPF:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="cpf_p">
								</div>
						</div>
						<div class="form-group row">
							<label for="nome_p" class="col-sm-2 col-form-label">Nome Completo:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="nome_p">
								</div>
						</div>
						<div class="form-group row">
							<label for="nasc_p" class="col-sm-2 col-form-label">Data de Nascimento:</label>
								<div class="col-sm-10">
							<input type="date" class="form-control" name="nasc_p">
								</div>
						</div>
						<div class="form-group row">
							<label for="end_p" class="col-sm-2 col-form-label">Endereço:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="end_p" placeholder="Logradouro, Nº, Bairro, Cidade">
								</div>
						</div>
						<div class="form-group row">
							<label for="naturalidade_p" class="col-sm-2 col-form-label">Naturalidade:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="naturalidade_p">
								</div>
						</div>
						<div class="form-group row">
							<label for="telefone_p" class="col-sm-2 col-form-label">Telefone:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="telefone_p" placeholder="00 12345-6789">
								</div>
						</div>
						<div class="form-group row">
							<label for="plano_p" class="col-sm-2 col-form-label">Plano de Saúde:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="plano_p" placeholder="Nome do Plano caso possua">
								</div>
						</div>
						<div class="form-group row">
							<label for="email_p" class="col-sm-2 col-form-label">E-mail:</label>
								<div class="col-sm-10">
							<input type="email" class="form-control" name="email_p">
								</div>
						</div>
						
						<div class="form-group row">
							<label for="login_p" class="col-sm-2 col-form-label">Login:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="login_p" maxlength="50">
								</div>
						</div>
						<div class="form-group row">
							<label for="senha_p" class="col-sm-2 col-form-label">Senha:</label>
								<div class="col-sm-10">
							<input type="password" class="form-control" name="senha_p">
								</div>
						</div>
												
							<input type="submit" value="Cadastrar_P">
						
					</form>
	
	</div>
	
	
  </div>
  
  <div class="footer">
  
  
  </div>
	</div>


</body>
</html>