<?php

class ClinicaDAO{
	
	function __construct(){}
	
	function salvar ($clinica, $conn){
		
		$sql= "INSERT INTO clinicas(cnpj,nome_c,razao_social,end_c,telefone_c) VALUES ('" .
			$clinica->getcnpj() . "','".
			$clinica->getnome_c() . "','".
			$clinica->getrazao_social() . "','".
			$clinica->getend_c() . "','".
			$clinica->gettelefone_c() ."')";
			
		echo "<br>" . $sql;
		
		if ($conn->query($sql)==TRUE){
			header("location: ..\View\I_CadastrarClinicas.php?msg=1");
		}
		else {
			header("location: ..\View\I_CadastrarClinicas.php?msg=2");
			echo $conn->error;
		}
	}
	
		function alterar ($clinica, $conn){
		
			$cnpj= $_POST['cnpj'];
			$nome_c= $_POST['nome_c'];
			$razao_social= $_POST['razao_social'];
			$end_c= $_POST['end_c'];
			$telefone_c= $_POST['telefone_c'];
			
			$sqlupdate= "UPDATE clinicas 
			SET cnpj = '".$cnpj."',
				nome_c= '".$nome_c."',
				razao_social= '".$razao_social."',
				end_c= '".$end_c."',
				telefone_c= '".$telefone_c."'
			WHERE cnpj = '".$cnpj."'";
		
			if (mysqli_query($conn, $sqlupdate)) {
				header("location: ..\View\I_AlterarClinicas.php?msg=1");
			} else {
				header("location: ..\View\I_AlterarClinicas.php?msg=2");
				echo $conn->error;
			}
		}
	
		
		function ExcluirClinica($cnpj, $conn){
		$sql = "DELETE FROM clinicas WHERE cnpj='" .$cnpj."'"; 
		$res = $conn->query($sql);
		if(!$res){
			throw new Exception('Não foi possível deletar');
		}
		return $res;
		
		}
}


?>