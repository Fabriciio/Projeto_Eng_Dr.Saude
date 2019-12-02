<?php

class FuncionarioDAO{
	
	function __construct(){}
	
	function salvar ($funcionario, $conn){
		
		$sql= "INSERT INTO funcionarios(cpf_f,nome_f,nasc_f,naturalidade_f,email_f,telefone_f,login_f,senha_f,tipo_f,crm_f,especialidade_f) VALUES ('" .
			$funcionario->getcpf_f() . "','".
			$funcionario->getnome_f() . "','".
			$funcionario->getnasc_f() . "','".
			$funcionario->getnaturalidade_f() . "','".
			$funcionario->getemail_f() . "','".
			$funcionario->gettelefone_f() . "','".
			$funcionario->getlogin_f() . "','".
			$funcionario->getsenha_f() . "','".
			$funcionario->gettipo_f() . "','".
			$funcionario->getcrm_f() . "','".
			$funcionario->getespecialidade_f() . "')";
			
		echo "<br>" . $sql;
		
		if ($conn->query($sql)==TRUE){
			header("location: ..\View\I_CadastrarFuncionarios.php?msg=1");
		}
		else {
			echo "Erro ao cadastrar funcionário:" .$conn->error;
		}
	}
	
		function alterar ($funcionario, $conn){
		
			$cpf_f= $_POST['cpf_f'];
			$nome_f= $_POST['nome_f'];
			$nasc_f= $_POST['nasc_f'];
			$naturalidade_f= $_POST['naturalidade_f'];
			$email_f= $_POST['email_f'];
			$telefone_f= $_POST['telefone_f'];
			$login_f= $_POST['login_f'];
			$senha_f= $_POST['senha_f'];
				$criptografada = md5($senha_f);
			$tipo_f= $_POST['tipo_f'];
			$crm_f= $_POST['crm_f'];
			$especialidade_f= $_POST['especialidade_f'];
			
			$sqlupdate= "UPDATE funcionarios 
			SET cpf_f = '".$cpf_f."',
				nome_f= '".$nome_f."',
				nasc_f= '".$nasc_f."',
				naturalidade_f= '".$naturalidade_f."',
				email_f= '".$email_f."',
				telefone_f= '".$telefone_f."',
				login_f= '".$login_f."',
				senha_f= '".$senha_f."',
				tipo_f= '".$tipo_f."',
				crm_f= '".$crm_f."',
				especialidade_f= '".$especialidade_f."' 
			WHERE cpf_f = '".$cpf_f."'";
		
			if (mysqli_query($conn, $sqlupdate)) {
				header("location: ..\View\I_AlterarFuncionarios.php?msg=1");
			} else {
				header("location: ..\View\I_AlterarFuncionarios.php?msg=2");
				echo $conn->error;
			}
		}
	
		
		function ExcluirFuncionarios($idFuncionario, $conn){
		$sql = "DELETE FROM usuario WHERE IdFuncionario='" .$idFuncionario."'"; 
		$res = $conn->query($sql);
		if(!$res){
			throw new Exception('Não foi possível deletar');
		}
		return $res;
		
		}
}


?>