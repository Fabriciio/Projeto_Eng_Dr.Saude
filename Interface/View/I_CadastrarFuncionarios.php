<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_CadastrarFuncionarios.php" class="close" data-dismiss="alert">&times</a>
						Funcionário cadastrado com sucesso.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="I_CadastrarFuncionarios.php" class="close" data-dismiss="alert">&times</a>
						Erro ao cadastrar funcionário.
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
	<div></div>
	<div></div>
	<div>
	<form action="../Controller/CadastrarFuncionario.php" method="POST">
						<div class="form-group row">
							<label for="cpf_f" class="col-sm-2 col-form-label">CPF:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="cpf_f">
								</div>
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Nome Completo:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="nome_f">
								</div>
						</div>
						<div class="form-group row">
							<label for="nasc_f" class="col-sm-2 col-form-label">Data de Nascimento:</label>
								<div class="col-sm-10">
							<input type="date" class="form-control" name="nasc_f">
								</div>
						</div>
						<div class="form-group row">
							<label for="naturalidade_f" class="col-sm-2 col-form-label">Naturalidade:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="naturalidade_f">
								</div>
						</div>
						<div class="form-group row">
							<label for="email_f" class="col-sm-2 col-form-label">E-mail:</label>
								<div class="col-sm-10">
							<input type="email" class="form-control" name="email_f">
								</div>
						</div>
						<div class="form-group row">
							<label for="telefone_f" class="col-sm-2 col-form-label">Telefone:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="telefone_f" placeholder="00 12345-6789">
								</div>
						</div>
						<div class="form-group row">
							<label for="login_f" class="col-sm-2 col-form-label">Login:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="login_f" maxlength="50">
								</div>
						</div>
						<div class="form-group row">
							<label for="senha_f" class="col-sm-2 col-form-label">Senha:</label>
								<div class="col-sm-10">
							<input type="password" class="form-control" name="senha_f">
								</div>
						</div>
						<div class="form-group row">
							<label for="tipo_f" class="col-sm-2 col-form-label">Tipo de Funcionário:</label>
								<div class="col-sm-10">
									<input list="tipo_f" class="form-control" name="tipo_f">
										<datalist id="tipo_f">
											<option value="3">Administrativo</option>
											<option value="2">Medico</option>
											<option value="1">Diretoria</option>
											<option value="0">SisAdmin</option>
										</datalist>
								</div>
						</div>
						<div class="form-group row">
							<label for="crm_f" class="col-sm-2 col-form-label">CRM:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="crm_f" placeholder="Se Médico digite o CRM">
								</div>
						</div>
						<div class="form-group row">
							<label for="especialidade_f" class="col-sm-2 col-form-label">Especialidade médica:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="especialidade_f" placeholder="Se Médico digite a Especialidade">
								</div>
						</div>
						
							<input type="submit" value="Cadastrar">
						
					</form>
				</div>
			<div></div>
			<div></div>
	
	</div>
	
	
  </div>
  
  <div class="footer">
  
  
  </div>
	</div>


</body>
</html>