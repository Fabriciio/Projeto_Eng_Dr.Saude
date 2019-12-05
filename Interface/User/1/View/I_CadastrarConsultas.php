<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_CadastrarFuncionarios.php" class="close" data-dismiss="alert">&times</a>
						Consulta cadastrada com sucesso.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="index.php" class="close" data-dismiss="alert">&times</a>
						Erro ao cadastrar consulta.
					</div>
				</div>
			<?php
			break;
		}
	}
	
try {
    $conexao = new PDO("mysql:host=localhost; dbname=bd_drsaude", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
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
      <div class="fakeimg"><a href="..\View\I_ConsultarFuncionarios.php">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarFuncionarios.php">Alterar/Excluir</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Pacientes</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarPacientes.php">Cadastrar</a></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarPacientes.php">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarPacientes.php">Alterar/Excluir</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Clinicas</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarClinicas.php">Cadastrar</a></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarClinicas.php">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarClinicas.php">Alterar/Excluir</a></div>
    </div>
	
	
	<div class="card1" >
      <div class="fakeimgtitle"><h3>Consultas</h3></div>
      <div class="fakeimg"><a href="..\View\I_CadastrarConsultas.php">Cadastrar</a></div>
      <div class="fakeimg"><a href="..\View\I_ConsultarConsultas.php">Consultar</a></div>
	  <div class="fakeimg"><a href="..\View\I_AlterarConsultas.php">Alterar/Excluir</a></div>	  
	</div>
   </div>

    <div class="box content">
	
	
	<form action="../Controller/CadastrarConsulta.php" method="POST">
						<div class="form-group row">
							<label for="cpf_f" class="col-sm-2 col-form-label">Data e Hora da Consulta:</label>
								<div class="col-sm-10">
							<input id="dt_consulta" type="datetime-local" class="form-control" name="dt_consulta"></div>
						</div>
						
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Paciente:</label>
							<div class="col-sm-10">
								<select name="paciente_a" class="form-control">
								<option>Selecione Paciente</option>
								  <?php
									$stmt = $conexao->prepare("SELECT * FROM pacientes");
 
										if ($stmt->execute()) {
											while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
										$vcpf_p=$rs->cpf_p;
										$vnome_p=$rs->nome_p;
										echo "<option value=$nome_p>$vnome_p</option>";
											}
										}
								  
								  ?>
								</select>
								</div>
								
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Médico:</label>
								<div class="col-sm-10">
							<select name="medico_a" class="form-control">
								<option>Selecione Médico</option>
								<?php
									$stmt = $conexao->prepare("SELECT * FROM funcionarios");
 
										if ($stmt->execute()) {
											while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
												if($rs->crm_f != NULL or $rs->crm_f != ""){
											$vcrm_f=$rs->crm_f;
											$vnome_f=$rs->nome_f;
											echo "<option value=$vnome_f>$vnome_f</option>";
											
												}
											}
										}
								  
								  ?>						
								</select>
								</div>
						</div>
						<div class="form-group row">
							<label for="end_p" class="col-sm-2 col-form-label">Clínica:</label>
								<div class="col-sm-10">
							<select name="clinica_a" class="form-control">
								<option>Selecione Clínica</option>
								<?php
									$stmt = $conexao->prepare("SELECT * FROM clinicas");
 
										if ($stmt->execute()) {
											while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
											$vcnpj=$rs->cnpj;
											$vnome_c=$rs->nome_c;
											echo "<option value=$vnome_c>$vnome_c</option>";
											
											}
										}
								  
								  ?>						
								</select>
								</div>
						</div>
						<div class="form-group row">
							<label for="cpf_f" class="col-sm-2 col-form-label">Data e Hora do agendamento:</label>
								<div class="col-sm-10">
							<input id="agendamento" type="datetime-local" class="form-control" name="agendamento"></div>
						</div>
						
							<input type="submit" value="Adicionar Consulta">
						
					</form>
	
	</div>
	
	
  </div>
  
  <div class="footer">
  
  
  </div>
	</div>


</body>
</html>