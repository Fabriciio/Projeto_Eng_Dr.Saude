<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Consulta.php';
include_once '..\Persistence\ConsultaDAO.php';


			$dt_consulta= $_POST['dt_consulta'];
			$paciente_a= $_POST['paciente_a'];
			$medico_a= $_POST['medico_a'];
			$clinica_a= $_POST['clinica_a'];
			$dt_agendamento= $_POST['dt_agendamento'];


$conexao = new Connection();
$conexao = $conexao->getConnection();

$c = new Consulta($dt_consulta,$paciente_a,$medico_a,$clinica_a,$dt_agendamento);

$usuariodao = new ConsultaDAO();
$usuariodao->salvar($c, $conexao);

?>
