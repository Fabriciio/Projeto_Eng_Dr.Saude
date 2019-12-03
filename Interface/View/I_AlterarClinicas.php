<?php 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];

		switch($msg){
			case 1:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarClinicas.php" class="close" data-dismiss="alert">&times</a>
						Clínica alterada com sucesso.
					</div>
				</div>
			<?php
			break;
			case 2:
			?>
				<div class="message">
					<div class="alert alert-danger">
						<a href="I_AlterarClinicas.php" class="close" data-dismiss="alert">&times</a>
						Erro ao alterar clínica.
					</div>
				</div>
			<?php
			break;
			case 3:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarClinicas.php" class="close" data-dismiss="alert">&times</a>
						Clínica excluída com sucesso.
					</div>
				</div>
			<?php
			break;
			case 4:
			?>
				<div class="message">
					<div class="alert alert-success">
						<a href="I_AlterarClinicas.php" class="close" data-dismiss="alert">&times</a>
						Erro ao excluir clínica.
					</div>
				</div>
			<?php
			break;
		}
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cnpj = (isset($_POST["cnpj"]) && $_POST["cnpj"] != null) ? $_POST["cnpj"] : "";
	$nome_c = (isset($_POST["nome_c"]) && $_POST["nome_c"] != null) ? $_POST["nome_c"] : "";
	$razao_social = (isset($_POST["razao_social"]) && $_POST["razao_social"] != null) ? $_POST["razao_social"] : "";
	$end_c = (isset($_POST["end_c"]) && $_POST["end_c"] != null) ? $_POST["end_c"] : "";
	$telefone_c = (isset($_POST["telefone_c"]) && $_POST["telefone_c"] != null) ? $_POST["telefone_c"] : "";

	
	

} else if (!isset($cpf_f)) {
    // Se não se não foi setado nenhum valor para variável $CPF
    $cnpj = (isset($_GET["cnpj"]) && $_GET["cnpj"] != null) ? $_GET["cnpj"] : "";
    $nome_c = NULL;
	$razao_social = NULL;
	$end_c = NULL;
	$telefone_c = NULL;
	

}
	
try {
    $conexao = new PDO("mysql:host=localhost; dbname=bd_drsaude", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $cnpj != "") {
    try {
        $stmt = $conexao->prepare("SELECT * FROM clinicas WHERE cnpj = ?");
        $stmt->bindParam(1, $cnpj, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $rs = $stmt->fetch(PDO::FETCH_OBJ);
            $cnpj = $rs->cnpj;
            $nome_c = $rs->nome_c;
			$razao_social = $rs->razao_social;
			$end_c = $rs->end_c;
			$telefone_c = $rs->telefone_c;		
			
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: ".$erro->getMessage();
    }
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $cnpj != "") {
    try {
        $stmt = $conexao->prepare("DELETE FROM clinicas WHERE cnpj = ?");
        $stmt->bindParam(1, $cnpj, PDO::PARAM_INT);
        if ($stmt->execute()) {
            header("location: ..\View\I_AlterarClinicas.php?msg=3");
        } else {
			header("location: ..\View\I_AlterarClinicas.php?msg=4");
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
	
	<form action="../Controller/AlterarClinica.php" method="POST">
						<div class="form-group row">
							<label for="cpf_f" class="col-sm-2 col-form-label">CNPJ:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="cnpj" 
							<?php
								if (isset($cnpj) && $cnpj != null || $cnpj != "") {
								echo "value=\"{$cnpj}\"";
								}
							?>></div>
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Nome Fantasia:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="nome_c" 
							<?php
								if (isset($nome_c) && $nome_c != null || $nome_c != "") {
								echo "value=\"{$nome_c}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="nome_f" class="col-sm-2 col-form-label">Razão Social:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="razao_social" 
							<?php
								if (isset($razao_social) && $razao_social != null || $razao_social != "") {
								echo "value=\"{$razao_social}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="end_p" class="col-sm-2 col-form-label">Endereço:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="end_c" placeholder="Logradouro, Nº, Bairro, Cidade" 
							<?php
								if (isset($end_c) && $end_c != null || $end_c != "") {
								echo "value=\"{$end_c}\"";
								}
							?>>
								</div>
						</div>
						<div class="form-group row">
							<label for="telefone_p" class="col-sm-2 col-form-label">Telefone:</label>
								<div class="col-sm-10">
							<input type="text" class="form-control" name="telefone_c" placeholder="00 12345-6789" 
							<?php
								if (isset($telefone_c) && $telefone_c != null || $telefone_c != "") {
								echo "value=\"{$telefone_c}\"";
								}
							?>>
								</div>
						</div>
						
							<input type="submit" value="Alterar">
						
					</form>
			
			<table border="1" width="100%">
    <tr>
        <th>CNPJ</th>
		<th>Nome Fantasia</th>
		<th>Razão Social</th>
		<th>Endereço</th>
		<th>Telefone</th>
		<th>Alterar/Excluir</th>
    </tr>
	
<?php
try {
 
    $stmt = $conexao->prepare("SELECT * FROM clinicas");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->cnpj."</td>
					<td>".$rs->nome_c."</td>
					<td>".$rs->razao_social. "</td>
					<td>".$rs->end_c. "</td>
					<td>".$rs->telefone_c. "</td>"
					."</td><td><center><a href=\"?act=upd&cnpj=" . $rs->cnpj . "\">[Alterar]</a>"
                    ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
                    ."<a href=\"?act=del&cnpj=" . $rs->cnpj . "\">[Excluir]</a></center></td>";
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