<?php 
	require ("..\Persistence\conexao.php");
	
	$login = $_POST['inputLogin'];
	$senha = md5($_POST['inputPassword']);
	
	$query = mysqli_query($conn,"SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'");
	$row = mysqli_num_rows($query);
	
	if ($row > 0){
		session_start();
		$_SESSION['login'] = $_POST['inputLogin'];
		$_SESSION['senha'] = $_POST['inputPassword'];
		header('Location: ..\View\I_Home.html');
	}else{
		header('Location: ..\View\I_Home.php');
	}
?>