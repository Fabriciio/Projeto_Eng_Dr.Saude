<?php

class Usuario{
	
	private	$cpf_f;
	private	$nome_f;
	private	$nasc_f;
	private	$naturalidade_f;
	private	$email_f;
	private	$telefone_f;
	private $login_f;
	private $senha_f;
	private $tipo_f;
	private $crm_f;
	private $especialidade_f;

	function __construct($vcpf_f,$vnome_f,$vnasc_f,$vnaturalidade_f,$vemail_f,$vtelefone_f,$vlogin_f,$vsenha_f,$vtipo_f,$vcrm_f,$vespecialidade_f){
		$this->cpf_f = $vcpf_f;
		$this->nome_f = $vnome_f;
		$this->nasc_f = $vnasc_f;
		$this->naturalidade_f = $vnaturalidade_f;
		$this->email_f = $vemail_f;
		$this->telefone_f = $vtelefone_f;
		$this->login_f = $vlogin_f;
		$this->senha_f = $vsenha_f;
		$this->tipo_f = $vtipo_f;
		$this->crm_f = $vcrm_f;
		$this->especialidade_f = $vespecialidade_f;
	}
	
	function getcpf_f (){
		return $this->cpf_f;
	}
	function getnome_f (){
		return $this->nome_f;
	}
	function getnasc_f (){
		return $this->nasc_f;
	}
	function getnaturalidade_f (){
		return $this->naturalidade_f;
	}
	function getemail_f (){
		return $this->email_f;
	}
	function gettelefone_f (){
		return $this->telefone_f;
	}
	function getlogin_f (){
		return $this->login_f;
	}
	function getsenha_f (){
		return $this->senha_f;
	}
	function gettipo_f (){
		return $this->tipo_f;
	}
	function getcrm_f (){
		return $this->crm_f;
	}
	function getespecialidade_f (){
		return $this->especialidade_f;
	}
	
}

?>