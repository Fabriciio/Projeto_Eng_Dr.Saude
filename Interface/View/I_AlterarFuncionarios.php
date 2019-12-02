<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_CadastrarFuncionarios.php" class="close" data-dismiss="alert">&times</a>
						Funcionário alterado com sucesso.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="index.php" class="close" data-dismiss="alert">&times</a>
						Erro ao alterar funcionário.
					</div>
				</div>
			<?php
			break;
			case 3:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_CadastrarFuncionarios.php" class="close" data-dismiss="alert">&times</a>
						Funcionário excluído com sucesso.
					</div>
				</div>
			<?php
			break;
			case 4:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_CadastrarFuncionarios.php" class="close" data-dismiss="alert">&times</a>
						Erro ao excluir funcionário.
					</div>
				</div>
			<?php
			break;
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf_f = (isset($_POST["cpf_f"]) && $_POST["cpf_f"] != null) ? $_POST["cpf_f"] : "";
	$nome_f = (isset($_POST["nome_f"]) && $_POST["nome_f"] != null) ? $_POST["nome_f"] : "";
	$nasc_f = (isset($_POST["nasc_f"]) && $_POST["nasc_f"] != null) ? $_POST["nasc_f"] : "";
	$naturalidade_f = (isset($_POST["naturalidade_f"]) && $_POST["naturalidade_f"] != null) ? $_POST["naturalidade_f"] : "";
	$email_f = (isset($_POST["email_f"]) && $_POST["email_f"] != null) ? $_POST["email_f"] : "";
	$telefone_f = (isset($_POST["telefone_f"]) && $_POST["telefone_f"] != null) ? $_POST["telefone_f"] : "";
	$login_f = (isset($_POST["login_f"]) && $_POST["login_f"] != null) ? $_POST["login_f"] : "";
	$senha_f = (isset($_POST["senha_f"]) && $_POST["senha_f"] != null) ? $_POST["senha_f"] : "";
	$tipo_f = (isset($_POST["tipo_f"]) && $_POST["tipo_f"] != null) ? $_POST["tipo_f"] : "";
	$crm_f = (isset($_POST["crm_f"]) && $_POST["crm_f"] != null) ? $_POST["crm_f"] : "";
	$especialidade_f = (isset($_POST["especialidade_f"]) && $_POST["especialidade_f"] != null) ? $_POST["especialidade_f"] : "";
} else if (!isset($cpf_f)) {
    // Se não se não foi setado nenhum valor para variável $CPF
    $cpf_f = (isset($_GET["cpf_f"]) && $_GET["cpf_f"] != null) ? $_GET["cpf_f"] : "";
    $nome_f = NULL;
	$nasc_f = NULL;
	$naturalidade_f = NULL;
	$email_f = NULL;
	$telefone_f = NULL;
	$login_f = NULL;
	$senha_f = NULL;
	$tipo_f = NULL;
	$crm_f = NULL;
	$especialidade_f = NULL;
}
	
try {
    $conexao = new PDO("mysql:host=localhost; dbname=bd_drsaude", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $cpf_f != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM funcionarios WHERE cpf_f = ?");
        $stmt->bindParam(1, $cpf_f, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $cpf_f = $rs->cpf_f;
            $nome_f = $rs->nome_f;
			$nasc_f = $rs->nasc_f;
			$naturalidade_f = $rs->naturalidade_f;
			$email_f = $rs->email_f;
			$telefone_f = $rs->telefone_f;
			$login_f = $rs->login_f;
			$senha_f = $rs->senha_f;
			$tipo_f = $rs->tipo_f;
			$crm_f = $rs->crm_f;
			$especialidade_f = $rs->especialidade_f;
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $cpf_f != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM funcionarios WHERE cpf_f = ?");
        $stmt->bindParam(1, $cpf_f, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("location: ..\View\I_AlterarFuncionarios.php?msg=3");
        } else {
			header("location: ..\View\I_AlterarFuncionarios.php?msg=4");
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
	
	<form action="../Controller/AlterarFuncionario.php" method="POST">
						<div class="form-group row">
							<label for="cpf_f" class="col-sm-2 col-form-label">CPF:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="cpf_f" 
							<?php
								if (isset($cpf_f) && $cpf_f != null || $cpf_f != "") {
								echo "value=\"{$cpf_f}\"";
								}
							?>></div>
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Nome Completo:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="nome_f" 
							<?php
								if (isset($nome_f) && $nome_f != null || $nome_f != "") {
								echo "value=\"{$nome_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="nasc_f" class="col-sm-2 col-form-label">Data de Nascimento:</label>
								<div class="col-sm-10">
							<input type="date" class="form-control" name="nasc_f" 
							<?php
								if (isset($nasc_f) && $nasc_f != null || $nasc_f != "") {
								echo "value=\"{$nasc_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="naturalidade_f" class="col-sm-2 col-form-label">Naturalidade:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="naturalidade_f" 
							<?php
								if (isset($naturalidade_f) && $naturalidade_f != null || $naturalidade_f != "") {
								echo "value=\"{$naturalidade_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="email_f" class="col-sm-2 col-form-label">E-mail:</label>
								<div class="col-sm-10">
							<input type="email" class="form-control" name="email_f" 
							<?php
								if (isset($email_f) && $email_f != null || $email_f != "") {
								echo "value=\"{$email_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="telefone_f" class="col-sm-2 col-form-label">Telefone:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="telefone_f" placeholder="00 12345-6789" 
							<?php
								if (isset($telefone_f) && $telefone_f != null || $telefone_f != "") {
								echo "value=\"{$telefone_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="login_f" class="col-sm-2 col-form-label">Login:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="login_f" maxlength="50" 
							<?php
								if (isset($login_f) && $login_f != null || $login_f != "") {
								echo "value=\"{$login_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="senha_f" class="col-sm-2 col-form-label">Senha:</label>
								<div class="col-sm-10">
							<input type="password" class="form-control" name="senha_f" 
							<?php
								if (isset($senha_f) && $senha_f != null || $senha_f != "") {
								echo "value=\"{$senha_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="tipo_f" class="col-sm-2 col-form-label">Tipo de Funcionário:</label>
								<div class="col-sm-10">
									<input list="tipos" name="tipo_f" 
							<?php
								if (isset($tipo_f) && $tipo_f != null || $tipo_f != "") {
								echo "value=\"{$tipo_f}\"";
								}
							?>>
										<datalist id="tipo_f">
											<option value="Administrativo">
											<option value="Medico">
											<option value="Diretoria">
											<option value="SisAdmin">
										</datalist>
								</div>
						</div>
						<div class="form-group row">
							<label for="crm_f" class="col-sm-2 col-form-label">CRM:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="crm_f" placeholder="Se Médico digite o CRM" 
							<?php
								if (isset($crm_f) && $crm_f != null || $crm_f != "") {
								echo "value=\"{$crm_f}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="especialidade_f" class="col-sm-2 col-form-label">Especialidade médica:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="especialidade_f" placeholder="Se Médico digite a Especialidade" 
							<?php
								if (isset($especialidade_f) && $especialidade_f != null || $especialidade_f != "") {
								echo "value=\"{$especialidade_f}\"";
								}
							?>>
								</div>
						</div>
						
							<input type="submit" value="Alterar">
						
					</form>
	
	
	
	
	
	
			<table border="1" width="100%">
    <tr>
        <th>CPF</th>
		<th>Nome</th>
		<th>Nascimento</th>
		<th>Naturalidade</th>
		<th>E-mail</th>
		<th>Telefone</th>
		<th>Login</th>
		<th>Senha</th>
		<th>Tipo de Funcionário</th>
		<th>CRM</th>
		<th>Especialidade</th>
		<th>Alterar/Excluir</th>
    </tr>
	
<?php
try {
 
    $stmt = $conexao->prepare("SELECT * FROM funcionarios");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->cpf_f."</td>
					<td>".$rs->nome_f."</td>
					<td>".$rs->nasc_f. "</td>
					<td>".$rs->naturalidade_f. "</td>
					<td>".$rs->email_f. "</td>
					<td>".$rs->telefone_f. "</td>
					<td>".$rs->login_f. "</td>
					<td>".$rs->senha_f. "</td>
					<td>".$rs->tipo_f. "</td>
					<td>".$rs->crm_f. "</td>
					<td>".$rs->especialidade_f. "</td>"
					."</td><td><center><a href=\"?act=upd&cpf_f=" . $rs->cpf_f . "\">[Alterar]</a>"
                    ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                    ."<a href=\"?act=del&cpf_f=" . $rs->cpf_f . "\">[Excluir]</a></center></td>";
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