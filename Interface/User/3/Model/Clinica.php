<?php

class Clinica{
	
	private	$cnpj;
	private	$nome_c;
	private	$razao_social;
	private	$end_c;
	private	$telefone_c;

	function __construct($vcnpj,$vnome_c,$vrazao_social,$vend_c,$vtelefone_c){
		$this->cnpj = $vcnpj;
		$this->nome_c = $vnome_c;
		$this->razao_social = $vrazao_social;
		$this->end_c = $vend_c;
		$this->telefone_c = $vtelefone_c;
	}
	
	function getcnpj (){
		return $this->cnpj;
	}
	function getnome_c (){
		return $this->nome_c;
	}
	function getrazao_social (){
		return $this->razao_social;
	}
	function getend_c (){
		return $this->end_c;
	}
	function gettelefone_c (){
		return $this->telefone_c;
	}
	
}

?>