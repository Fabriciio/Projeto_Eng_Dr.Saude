<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Clinica.php';
include_once '..\Persistence\ClinicaDAO.php';


			$cnpj= $_POST['cnpj'];
			$nome_c= $_POST['nome_c'];
			$razao_social= $_POST['razao_social'];
			$end_c= $_POST['end_c'];
			$telefone_c= $_POST['telefone_c'];


$conexao = new Connection();
$conexao = $conexao->getConnection();

$c = new Clinica($cnpj,$nome_c,$razao_social,$end_c,$telefone_c);

$usuariodao = new ClinicaDAO();
$usuariodao->salvar($c, $conexao);

?>