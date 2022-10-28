<?php

    include_once('../conexao.php');
    if(isset($_POST["email"]) && isset($_POST["senha"]) && $conexao != null){

		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$sql = "SELECT * FROM psicologa WHERE psicologa_email = '{$email}'";
		$result = $conexao->query($sql);
        $dados = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) == 1){    
            if ($senha == $dados['psicologa_senha']) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['adm'] = $dados['psicologa_adm'];
                header('Location: ../menupsico.php');}
            else {
                    echo "<script>
                        alert('Senha errada.');
						window.location.href='../admin.php';
                    </script>";}
           
        } else {
            echo "<script>
                alert('Cadastro não encontrado.');
                window.location.href='../admin.php';
                </script>";
			
        } 
    }
?>