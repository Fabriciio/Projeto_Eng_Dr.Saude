<?php

class ConsultaDAO{
	
	function __construct(){}
	
	function salvar ($consulta, $conn){
		
		$sql= "INSERT INTO agenda (dt_consulta,paciente_a,medico_a,clinica_a,dt_agendamento) VALUES ('" .
			$consulta->getdt_consulta() . "','".
			$consulta->getpaciente_a() . "','".
			$consulta->getmedico_a() . "','".
			$consulta->getclinica_a() . "','".
			$consulta->getdt_agendamento() ."')";
			
		echo "<br>" . $sql;
		
		if ($conn->query($sql)==TRUE){
			header("location: ..\View\I_CadastrarConsultas.php?msg=1");
		}
		else {
			header("location: ..\View\I_CadastrarConsultas.php?msg=2");
			echo $conn->error;
		}
	}
	
		function alterar ($dt_consulta, $conn){
		
			$dt_consulta= $_POST['dt_consulta'];
			$paciente_a= $_POST['paciente_a'];
			$medico_a= $_POST['medico_a'];
			$clinica_a= $_POST['clinica_a'];
			$dt_agendamento= $_POST['dt_agendamento'];
			
			$sqlupdate= "UPDATE agenda 
			SET dt_consulta = '".$dt_consulta."',
				paciente_a= '".$paciente_a."',
				medico_a= '".$medico_a."',
				clinica_a= '".$clinica_a."',
				dt_agendamento= '".$dt_agendamento."'
			WHERE dt_consulta = '".$dt_consulta."'";
		
			if (mysqli_query($conn, $sqlupdate)) {
				header("location: ..\View\I_AlterarConsultas.php?msg=1");
			} else {
				header("location: ..\View\I_AlterarConsultas.php?msg=2");
				echo $conn->error;
			}
		}
	
		
		function ExcluirClinica($dt_consulta, $conn){
		$sql = "DELETE FROM clinicas WHERE dt_consulta='" .$dt_consulta."'"; 
		$res = $conn->query($sql);
		if(!$res){
			throw new Exception('Não foi possível deletar');
		}
		return $res;
		
		}
}


?>