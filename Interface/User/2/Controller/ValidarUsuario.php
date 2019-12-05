<?php 
	require ("..\Persistence\Connection.php");
	
	$login = $_POST['inputLogin'];
	$senha = md5($_POST['inputPassword']);
	
	$query = mysqli_query($conn,"SELECT * FROM funcionarios WHERE login_f = '$login_f' AND senha_f = '$senha_f'");
	$row = mysqli_num_rows($query);
		$criptografada = md5($senha_f);
	
	if ($row > 0){
		session_start();
		$_SESSION['login_f'] = $_POST['inputLogin'];
		$_SESSION['criptografada'] = $_POST['inputPassword'];
		header('Location: ..\View\I_Home.php');
	}else{
		header('Location: ..\View\I_Home.php');
	}
?>