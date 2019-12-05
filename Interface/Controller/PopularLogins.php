<?php 
	
try {
    $conexao = new PDO("mysql:host=localhost; dbname=bd_drsaude", "root", "");
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexao->exec("set names utf8");
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}
 ?>
 
<?php
try {
 
    $stmt = $conexao->prepare("SELECT * FROM funcionarios");
 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                
                $sql="INSERT INTO logins (id_l, login_l, senha_l, permissao_l, email_l) VALUES ('"
						$rs->cpf_f "','"
						$rs->login_f "','"
						$rs->senha_f "','"
						$rs->tipO_f "','"
						$rs->email_f"')'";

            }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}

?>