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
      <div class="fakeimg"><a href="..\View\I_ConsultarFuncionarios.php">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarFuncionarios.php">Alterar</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Pacientes</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarFuncionarios.html">Cadastrar</a></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarFuncionarios.html">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarFuncionarios.php">Alterar</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Clinicas</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarFuncionarios.html">Cadastrar</a></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarFuncionarios.html">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarFuncionarios.php">Alterar</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Consultas</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarFuncionarios.html">Cadastrar</a></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarFuncionarios.html">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarFuncionarios.php">Alterar</a></div>	  
	</div>
   </div>
	
    <div class="box content">
	
	<form action="../Controller/CadastrarFuncionarios.php" method="POST">
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
							<input type="email" class="form-control" name="email_f" pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/">
								</div>
						</div>
						<div class="form-group row">
							<label for="telefone_f" class="col-sm-2 col-form-label">Telefone:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="telefone_f" pattern="[0-9][0-9] [0-9][0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]" placeholder="00 12345-6789">
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
							<label for="tipo_funcionario" class="col-sm-2 col-form-label">Tipo de Funcionário:</label>
								<div class="col-sm-10">
							<select class="form-control" name="tipo_funcionario">
								<option value="null">Selecione</option>
								<option value="administrativo">Administrativo</option>
								<option value="medico">Médico</option>
								<option value="direcao">Direção</option>
								<option value="sisadmin">SisAdmin</option>
							</select>
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
	
	
  </div>
  
  <div class="footer">
  
  
  </div>
	</div>


</body>
</html>