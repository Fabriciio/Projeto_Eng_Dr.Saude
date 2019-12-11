<?php

class Paciente{
	
	private	$cpf_p;
	private	$nome_p;
	private	$nasc_p;
	private	$end_p;
	private	$naturalidade_p;
	private	$telefone_p;
	private $plano_p;
	private $email_p;
	private $login_p;
	private $senha_p;

	function __construct($vcpf_p,$vnome_p,$vnasc_p,$vend_p,$vnaturalidade_p,$vtelefone_p,$vplano_p,$email_p,$vlogin_p,$vsenha_p){
		$this->cpf_p = $vcpf_p;
		$this->nome_p = $vnome_p;
		$this->nasc_p = $vnasc_p;
		$this->end_p = $vend_p;
		$this->naturalidade_p = $vnaturalidade_p;
		$this->telefone_p = $vtelefone_p;
		$this->plano_p = $vplano_p;
		$this->email_p = $vemail_p;
		$this->login_p = $vlogin_p;
		$this->senha_p = $vsenha_p;
	}
	
	function getcpf_p (){
		return $this->cpf_p;
	}
	function getnome_p (){
		return $this->nome_p;
	}
	function getnasc_p (){
		return $this->nasc_p;
	}
	function getend_p (){
		return $this->end_p;
	}
	function getnaturalidade_p (){
		return $this->naturalidade_p;
	}
	function gettelefone_p (){
		return $this->telefone_p;
	}
	function getplano_p (){
		return $this->plano_p;
	}
	function getemail_p (){
		return $this->email_p;
	}
	function getlogin_p (){
		return $this->login_p;
	}
	function getsenha_p (){
		return $this->senha_p;
	}
	
}

?>