<?php

include_once '..\Persistence\Connection.php';
include_once '..\Persistence\UsuarioDAO.php';

$idFuncionario = $_POST=['idFuncionario'][0];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$usuariodao = new UsuarioDAO();
$res= $usuariodao->ListarFuncionarios($conexao);

if($res->num_rows>0){
	
$res= $usuariodao->ExcluirFuncionarios($idFuncionario,$conexao);
}

if ($res == TRUE) {
	header("location: ListarFuncionarios.php");
}else {
	echo "Erro ao excluir:" .$conexao->error;
}
?> 