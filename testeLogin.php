<?php

//print_r($_REQUEST);

	if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
	{
		include_once('conexao.php');
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		$sql = "SELECT * FROM usuarios WHERE usuario_email = '{$email}'";
		$result = $conexao->query($sql);
        $dados = mysqli_fetch_assoc($result);
		//print_r($result);

		if(mysqli_num_rows($result) == 1)
        {    
            if (password_verify($senha, $dados['usuario_senha'])) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['nome'] = $dados['usuario_nome'];
                $_SESSION['id'] = $dados['usuario_id'];
                header('Location: menu.php');
            } else {
                echo "<script>
                        alert('Senha errada.');
						window.location.href='login.php';
                     </script>";
					
		    }
        } else {
            echo "<script>
                alert('Cadastro não encontrado.');
				window.location.href='login.php';
             </script>";
			
        }     
    } else {
        header('Location: login.php');
    }

?>