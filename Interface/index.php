<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<title>Dr. Saude - Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>

		<article>
			<form name="form_pesquisa" id="form_pesquisa" method="post" action="">
				<div id="login-box">
					<H2>Bem Vindo(a)</H2>
					Digite seu e-mail e senha para acessar o sistema Dr. Saude.
					<br/>
					<br/>
					<div id="login-box-name">Email:</div>
					<div id="login-box-field">
						<input name="email" class="form-login" title="Username" value="" size="50" placeholder="usuario@email.com"/>
					</div>
					<div id="login-box-name">Password:</div>
					<div id="login-box-field">
						<input name="pass" type="password" class="form-login" title="Password" value="" size="50"/>
					</div>
					<br/>
					<span class="login-box-options">
						<input type="checkbox" name="remember" value="1"> Lembrar Senha 
						<a href="#" style="margin-left:30px;">Esqueceu a senha?</a>
					</span>

					<input type="submit" value="" class="bt-enviar"/>
					<input type="hidden" name="acao" value="logar"/>
				</div>
			</form>
		</article>
</body>
</html>
<?php
$action = isset($_POST['acao']) ? trim($_POST['acao']) : '';
	if(isset($action) && $action != ""){ 
		
		switch($action){
			case 'logar':
				//requerimos nossa classe de autentica��o passando os valores dos inputs como par�metros
				require_once('class/Autentica.class.php');
				//instancio a classse para podermos usar o m�todo nela contida
				$Autentica = new Autentica();
				//setamos 
				$Autentica->email	= $_POST['email'];
				$Autentica->pass	= $_POST['pass'];
				$Autentica->pass = md5($Autentica->pass);
				//chamamos nosso m�todo						
				if($Autentica->Validar_Usuario()){
				   echo  "<script type='text/javascript'>
						if(".$_SESSION['tip']."==0){
							location.href='View/I_Home.php'
						} 
						else if(".$_SESSION['tip']."==1){
							location.href='User/1/View/I_Home.php'
						}
						else if(".$_SESSION['tip']."==2){
							location.href='User/2/View/I_Home.php'
						}
						else if(".$_SESSION['tip']."==3){
							location.href='User/3/View/I_Home.php'
						}
						else {
							location.href='User/paciente/View/I_Home.php'
						}
						</script>";
				  }else{
				   echo  "<script type='text/javascript'>
							alert('ATEN\u00c7\u00c4O, Login ou Senha inv\u00e1lidos...');location.href='index.php'
						</script>";
				  }
			break;
		}	
	}
?>