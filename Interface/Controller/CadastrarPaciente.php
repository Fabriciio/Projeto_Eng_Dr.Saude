<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Paciente.php';
include_once '..\Persistence\PacienteDAO.php';


	$cpf_p= $_POST['cpf_p'];
	$nome_p= $_POST['nome_p'];
	$nasc_p= $_POST['nasc_p'];
	$end_p= $_POST['end_p'];
	$naturalidade_p= $_POST['naturalidade_p'];
	$telefone_p= $_POST['telefone_p'];
	$plano_p= $_POST['plano_p'];
	$email_p= $_POST['email_p'];
	$login_p= $_POST['login_p'];
	$senha_p= $_POST['senha_p'];
	$criptografada_p = md5($senha_p);


$conexao = new Connection();
$conexao = $conexao->getConnection();

$c = new Usuario($cpf_p,$nome_p,$nasc_p,$end_p,$naturalidade_p,$telefone_p,$plano_p,$email_p,$login_p,$criptografada_p);

$usuariodao = new PacienteDAO();
$usuariodao->salvar($c, $conexao);

?>