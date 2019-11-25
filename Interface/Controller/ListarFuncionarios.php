<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\UsuarioDAO.php';

$conexao = new Connection();
$conexao = $conexao->getConnection();

$usuariodao = new UsuarioDAO();
$res= $usuariodao->ListarFuncionarios($conexao);

if ($res->num_rows > 0) {
	echo "<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
	
	<table>
				<tr>
					<th>Nome</th>
					<th>Salario</th>
					<th>Departamento</th>
					<th>Tipo_Funcionario</th>
					<th>Login</th>
					<th>Senha</th>
					<th>IdFuncionario</th>
					<th>Alterar</th>
					<th>Excluir</th>
				</tr>";
	while( $registro = $res->fetch_assoc() ){
		echo "<tr>";
		echo "<td>" .$registro['Nome'] . "</td>" .
			 "<td>" .$registro['Salario'] . "</td>" .
			 "<td>" .$registro['Departamento'] . "</td>" .
			 "<td>" .$registro['Tipo_Funcionario'] . "</td>" .
			 "<td>" .$registro['Login'] . "</td>" .
			 "<td>" .$registro['Senha'] ."</td>" .
			 "<td>" .$registro['IdFuncionario'] ."</td>" .
			 "<td> <a href=AlterarFuncionarios.php>Alterar</a>" . "</td>" .
			 "<td> <a href=ExcluirFuncionarios.php>Excluir</a></td>";
		echo "</tr>";
	}
	echo "</table>
	

	</body>
	</html>";
	
	
	
	
}
else {
	echo "Nenhum Usuário Cadastrado";
}
?>