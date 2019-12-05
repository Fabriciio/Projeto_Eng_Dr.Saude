<?php

class PacienteDAO{
	
	function __construct(){}
	
	function salvar ($paciente, $conn){
		
		$sql= "INSERT INTO pacientes(cpf_p,nome_p,nasc_p,end_p,naturalidade_p,telefone_p,plano_p,email_p,login_p,senha_p) VALUES ('" .
			$paciente->getcpf_p() . "','".
			$paciente->getnome_p() . "','".
			$paciente->getnasc_p() . "','".
			$paciente->getend_p() . "','".
			$paciente->getnaturalidade_p() . "','".
			$paciente->gettelefone_p() . "','".
			$paciente->getplano_p() . "','".
			$paciente->getemail_p() . "','".
			$paciente->getlogin_p() . "','".
			$paciente->getsenha_p() . "')";
			
		echo "<br>" . $sql;
		
		if ($conn->query($sql)==TRUE){
			header("location: ..\View\I_CadastrarPacientes.php?msg=1");
		}
		else {
			header("location: ..\View\I_CadastrarPacientes.php?msg=2");
			echo $conn->error;
		}
	}
	
		function alterar ($paciente, $conn){
		
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
			
			$sqlupdate= "UPDATE pacientes 
			SET cpf_p = '".$cpf_p."',
				nome_p= '".$nome_p."',
				nasc_p= '".$nasc_p."',
				end_p= '".$end_p."',
				naturalidade_p= '".$naturalidade_p."',
				telefone_p= '".$telefone_p."',
				plano_p= '".$plano_p."',
				email_p= '".$email_p."',			
				login_p= '".$login_p."',
				senha_p= '".$criptografada_p."'
			WHERE cpf_p = '".$cpf_p."'";
		
			if (mysqli_query($conn, $sqlupdate)) {
				header("location: ..\View\I_AlterarPacientes.php?msg=1");
			} else {
				header("location: ..\View\I_AlterarPacientes.php?msg=2");
				echo $conn->error;
			}
		}
	
		
		function ExcluirPacientes($cpf_p, $conn){
		$sql = "DELETE FROM pacientes WHERE cpf_p='" .$cpf_p."'"; 
		$res = $conn->query($sql);
		if(!$res){
			throw new Exception('Não foi possível deletar');
		}
		return $res;
		
		}
}


?>