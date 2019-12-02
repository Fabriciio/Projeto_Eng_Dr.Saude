<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Funcionario.php';
include_once '..\Persistence\FuncionarioDAO.php';

$cpf_f = $_POST['cpf_f'];
$nome_f = $_POST['nome_f'];
$nasc_f = $_POST['nasc_f'];
$naturalidade_f= $_POST['naturalidade_f'];
$email_f= $_POST['email_f'];
$telefone_f= $_POST['telefone_f'];
$login_f= $_POST['login_f'];
$senha_f= $_POST['senha_f'];
	$criptografada = md5($senha_f);
$tipo_f= $_POST['tipo_f'];
$crm_f= $_POST['crm_f'];
$especialidade_f= $_POST['especialidade_f'];

$conexao = new Connection();
$conexao = $conexao->getConnection();

$c = new Usuario($cpf_f,$nome_f,$nasc_f,$naturalidade_f,$email_f,$telefone_f,$login_f,$criptografada,$tipo_f,$crm_f,$especialidade_f);

$usuariodao = new FuncionarioDAO();
$usuariodao->alterar($c, $conexao);

?>