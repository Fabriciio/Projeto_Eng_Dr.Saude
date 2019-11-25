<?php

include_once '..\Persistence\Connection.php';
include_once '..\Model\Usuario.php';
include_once '..\Persistence\UsuarioDAO.php';

$nome = $_POST['nome'];
$salario = $_POST['salario'];
$departamento = $_POST['departamento'];
$tipo_funcionario= $_POST['tipo_funcionario'];
$login= $_POST['login'];
$senha= $_POST['senha'];
$criptografada = md5($senha);

$conexao = new Connection();
$conexao = $conexao->getConnection();

$c = new Usuario($nome,$salario,$departamento,$tipo_funcionario,$login,$criptografada);

$usuariodao = new UsuarioDAO();
$usuariodao->salvar($c, $conexao);

/*$sql="INSERT INTO usuario(nome, salario, departamento, tipo_funcionario,login,senha) VALUES ('$nome', '$salario', '$departamento', '$tipo_funcionario,login','$senha')";

if( $conn->query($sql)==TRUE){
	echo "Cliente Cadastrado";
}
else {
	echo "Erro ao cadastrar: <br>".$conn->error;
}*/

?>