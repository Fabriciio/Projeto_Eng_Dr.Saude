<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarConsultas.php" class="close" data-dismiss="alert">&times</a>
						Consulta alterada com sucesso.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="I_AlterarConsultas.php" class="close" data-dismiss="alert">&times</a>
						Erro ao alterar consulta.
					</div>
				</div>
			<?php
			break;
			case 3:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarConsultas.php" class="close" data-dismiss="alert">&times</a>
						Consulta excluída com sucesso.
					</div>
				</div>
			<?php
			break;
			case 4:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarConsultas.php" class="close" data-dismiss="alert">&times</a>
						Erro ao excluir consulta.
					</div>
				</div>
			<?php
			break;
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dt_consulta = (isset($_POST["dt_consulta"]) && $_POST["dt_consulta"] != null) ? $_POST["dt_consulta"] : "";
	$paciente_a = (isset($_POST["paciente_a"]) && $_POST["paciente_a"] != null) ? $_POST["paciente_a"] : "";
	$medico_a = (isset($_POST["medico_a"]) && $_POST["medico_a"] != null) ? $_POST["medico_a"] : "";
	$clinica_a = (isset($_POST["clinica_a"]) && $_POST["clinica_a"] != null) ? $_POST["clinica_a"] : "";
	$dt_agendamento = (isset($_POST["dt_agendamento"]) && $_POST["dt_agendamento"] != null) ? $_POST["dt_agendamento"] : "";

	
	

} else if (!isset($cpf_f)) {
    // Se não se não foi setado nenhum valor para variável $CPF
    $dt_consulta = (isset($_GET["dt_consulta"]) && $_GET["dt_consulta"] != null) ? $_GET["dt_consulta"] : "";
    $paciente_a = NULL;
	$medico_a = NULL;
	$clinica_a = NULL;
	$dt_agendamento = NULL;
	

}
	
try {
    $conexao = new PDO("mysql:host=localhost; dbname=bd_drsaude", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $dt_consulta != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM agenda WHERE dt_consulta = ?");
        $stmt->bindParam(1, $dt_consulta, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $dt_consulta = $rs->dt_consulta;
            $paciente_a = $rs->paciente_a;
			$medico_a = $rs->medico_a;
			$clinica_a = $rs->clinica_a;
			$dt_agendamento = $rs->dt_agendamento;		
			
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $dt_consulta != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM agenda WHERE dt_consulta = ?");
        $stmt->bindParam(1, $dt_consulta, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("location: ..\View\I_AlterarConsultas.php?msg=3");
        } else {
			header("location: ..\View\I_AlterarConsultas.php?msg=4");
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
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
	
	<form action="../Controller/AlterarConsulta.php" method="POST">
						<div class="form-group row">
							<label for="cpf_f" class="col-sm-2 col-form-label">Data e Hora da Consulta:</label>
								<div class="col-sm-10">
							<input id="dt_consulta" type="datetime-local" class="form-control" name="dt_consulta" 
							<?php
								if (isset($dt_consulta) && $dt_consulta != null || $dt_consulta != "") {
								echo "value=\"{$dt_consulta}\"";
								}
							?>></div>
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Paciente:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="paciente_a" placeholder="Nome ou CPF"
							<?php
								if (isset($paciente_a) && $paciente_a != null || $paciente_a != "") {
								echo "value=\"{$paciente_a}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Médico:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="medico_a" placeholder="Nome ou CRM" 
							<?php
								if (isset($medico_a) && $medico_a != null || $medico_a != "") {
								echo "value=\"{$medico_a}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="end_p" class="col-sm-2 col-form-label">Clínica:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="clinica_a" placeholder="Nome Fantasia ou CNPJ" 
							<?php
								if (isset($clinica_a) && $clinica_a != null || $clinica_a != "") {
								echo "value=\"{$clinica_a}\"";
								}
							?>>
								</div>
						</div>
						
						
							<input type="submit" value="Alterar Consulta">
						
					</form>
			
			<table border="1" width="100%">
    <tr>
        <th>Data e Hora da Consulta</th>
		<th>Paciente</th>
		<th>Medico</th>
		<th>Clínica</th>
		<th>Agendada em:</th>
		<th>Alterar/Excluir</th>
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
					<td>".$rs->dt_agendamento. "</td>"
					."</td><td><center><a href=\"?act=upd&dt_consulta=" . $rs->dt_consulta . "\">[Alterar]</a>"
                    ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                    ."<a href=\"?act=del&dt_consulta=" . $rs->dt_consulta . "\">[Excluir]</a></center></td>";
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