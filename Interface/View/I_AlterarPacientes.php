<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarPacientes.php" class="close" data-dismiss="alert">&times</a>
						Paciente alterado com sucesso.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="I_AlterarPacientes.php" class="close" data-dismiss="alert">&times</a>
						Erro ao alterar paciente.
					</div>
				</div>
			<?php
			break;
			case 3:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarPacientes.php" class="close" data-dismiss="alert">&times</a>
						Paciente excluído com sucesso.
					</div>
				</div>
			<?php
			break;
			case 4:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarPacientes.php" class="close" data-dismiss="alert">&times</a>
						Erro ao excluir paciente.
					</div>
				</div>
			<?php
			break;
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cpf_p = (isset($_POST["cpf_p"]) && $_POST["cpf_p"] != null) ? $_POST["cpf_p"] : "";
	$nome_p = (isset($_POST["nome_p"]) && $_POST["nome_p"] != null) ? $_POST["nome_p"] : "";
	$nasc_p = (isset($_POST["nasc_p"]) && $_POST["nasc_p"] != null) ? $_POST["nasc_p"] : "";
	$end_p = (isset($_POST["end_p"]) && $_POST["end_p"] != null) ? $_POST["end_p"] : "";
	$naturalidade_p = (isset($_POST["naturalidade_p"]) && $_POST["naturalidade_f"] != null) ? $_POST["naturalidade_p"] : "";
	$telefone_p = (isset($_POST["telefone_p"]) && $_POST["telefone_p"] != null) ? $_POST["telefone_p"] : "";
	$plano_p = (isset($_POST["plano_p"]) && $_POST["plano_p"] != null) ? $_POST["plano_p"] : "";
	$email_p = (isset($_POST["email_p"]) && $_POST["email_p"] != null) ? $_POST["email_p"] : "";
	$login_p = (isset($_POST["login_f"]) && $_POST["login_p"] != null) ? $_POST["login_p"] : "";
	$senha_p = (isset($_POST["senha_p"]) && $_POST["senha_p"] != null) ? $_POST["senha_p"] : "";
	
	

} else if (!isset($cpf_f)) {
    // Se não se não foi setado nenhum valor para variável $CPF
    $cpf_p = (isset($_GET["cpf_p"]) && $_GET["cpf_p"] != null) ? $_GET["cpf_p"] : "";
    $nome_p = NULL;
	$nasc_p = NULL;
	$end_p = NULL;
	$naturalidade_p = NULL;
	$telefone_p = NULL;
	$plano_p = NULL;
	$email_p = NULL;
	$login_p = NULL;
	$senha_p = NULL;
	
	

}
	
try {
    $conexao = new PDO("mysql:host=localhost; dbname=bd_drsaude", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $cpf_p != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM pacientes WHERE cpf_p = ?");
        $stmt->bindParam(1, $cpf_p, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $cpf_p = $rs->cpf_p;
            $nome_p = $rs->nome_p;
			$nasc_p = $rs->nasc_p;
			$end_p = $rs->end_p;
			$naturalidade_p = $rs->naturalidade_p;
			$telefone_p = $rs->telefone_p;
			$plano_p = $rs->plano_p;
			$email_p = $rs->email_p;
			$login_p = $rs->login_p;
			$senha_p = $rs->senha_p;
			
			
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $cpf_p != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM pacientes WHERE cpf_p = ?");
        $stmt->bindParam(1, $cpf_p, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("location: ..\View\I_AlterarPacientes.php?msg=3");
        } else {
			header("location: ..\View\I_AlterarPacientes.php?msg=4");
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
	
	<form action="../Controller/AlterarPaciente.php" method="POST">
						<div class="form-group row">
							<label for="cpf_f" class="col-sm-2 col-form-label">CPF:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="cpf_p" 
							<?php
								if (isset($cpf_p) && $cpf_p != null || $cpf_p != "") {
								echo "value=\"{$cpf_p}\"";
								}
							?>></div>
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Nome Completo:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="nome_p" 
							<?php
								if (isset($nome_p) && $nome_p != null || $nome_p != "") {
								echo "value=\"{$nome_p}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="nasc_f" class="col-sm-2 col-form-label">Data de Nascimento:</label>
								<div class="col-sm-10">
							<input type="date" class="form-control" name="nasc_p" 
							<?php
								if (isset($nasc_p) && $nasc_p != null || $nasc_p != "") {
								echo "value=\"{$nasc_p}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="end_p" class="col-sm-2 col-form-label">Endereço:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="end_p" placeholder="Logradouro, Nº, Bairro, Cidade" 
							<?php
								if (isset($end_p) && $end_p != null || $end_p != "") {
								echo "value=\"{$end_p}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="naturalidade_p" class="col-sm-2 col-form-label">Naturalidade:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="naturalidade_p" 
							<?php
								if (isset($naturalidade_p) && $naturalidade_p != null || $naturalidade_p != "") {
								echo "value=\"{$naturalidade_p}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="telefone_p" class="col-sm-2 col-form-label">Telefone:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="telefone_p" placeholder="00 12345-6789" 
							<?php
								if (isset($telefone_p) && $telefone_p != null || $telefone_p != "") {
								echo "value=\"{$telefone_p}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="plano_p" class="col-sm-2 col-form-label">Plano de Saúde:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="plano_p" placeholder="Nome do Plano caso possua" 
							<?php
								if (isset($plano_p) && $plano_p != null || $plano_p != "") {
								echo "value=\"{$plano_p}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="email_p" class="col-sm-2 col-form-label">E-mail:</label>
								<div class="col-sm-10">
							<input type="email" class="form-control" name="email_p" 
							<?php
								if (isset($email_p) && $email_p != null || $email_p != "") {
								echo "value=\"{$email_p}\"";
								}
							?>>
								</div>
						</div>
						
						<div class="form-group row">
							<label for="login_p" class="col-sm-2 col-form-label">Login:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="login_p" maxlength="50" 
							<?php
								if (isset($login_p) && $login_p != null || $login_p != "") {
								echo "value=\"{$login_p}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="senha_p" class="col-sm-2 col-form-label">Senha:</label>
								<div class="col-sm-10">
							<input type="password" class="form-control" name="senha_p" 
							<?php
								if (isset($senha_p) && $senha_p != null || $senha_p != "") {
								echo "value=\"{$senha_p}\"";
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
		<th>Endereço</th>
		<th>Telefone</th>
		<th>Plano de Saúde</th>
		<th>E-mail</th>
		<th>Login</th>

		<th>Alterar/Excluir</th>
    </tr>
	
<?php
try {
 
    $stmt = $conexao->prepare("SELECT * FROM pacientes");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->cpf_p."</td>
					<td>".$rs->nome_p."</td>
					<td>".$rs->nasc_p. "</td>
					<td>".$rs->end_p. "</td>
					<td>".$rs->naturalidade_p. "</td>
					<td>".$rs->telefone_p. "</td>
					<td>".$rs->plano_p. "</td>
					<td>".$rs->email_p. "</td>
					<td>".$rs->login_p. "</td>"
					."</td><td><center><a href=\"?act=upd&cpf_p=" . $rs->cpf_p . "\">[Alterar]</a>"
                    ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                    ."<a href=\"?act=del&cpf_p=" . $rs->cpf_p . "\">[Excluir]</a></center></td>";
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