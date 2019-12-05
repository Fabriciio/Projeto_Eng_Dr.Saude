<?php

class Consulta{
	
	private	$dt_consulta;
	private	$paciente_a;
	private	$medico_a;
	private	$clinica_a;
	private	$dt_agendamento;

	function __construct($vdt_consulta,$vpaciente,$vmedico,$vclinica,$vagendamento){
		$this->dt_consulta = $vdt_consulta;
		$this->paciente_a = $vpaciente_a;
		$this->medico_a = $vmedico_a;
		$this->clinica_a = $vclinica_a;
		$this->dt_agendamento = $vdt_agendamento;
	}
	
	function getdt_consulta (){
		return $this->dt_consulta;
	}
	function getpaciente_a (){
		return $this->paciente_a;
	}
	function getmedico_a (){
		return $this->medico_a;
	}
	function getclinica_a (){
		return $this->clinica_a;
	}
	function getdt_agendamento (){
		return $this->dt_agendamento;
	}
	
}

?>