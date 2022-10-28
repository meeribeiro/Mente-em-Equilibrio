<?php
    if(isset($_POST['submit'])){
        //print_r($_POST['nome']);
        //print_r($_POST['email']);
        include_once('conexao.php');

        $nome = $_POST['nome'];
        $dtNasc = $_POST['dtNasc'];
        $sexo = $_POST['sexo'];
        $endereco = $_POST['endereco'];
        $pais = $_POST['pais'];
        $telefone =$_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $confsenha = $_POST['confsenha'];

        $sqlEmail = mysqli_query($conexao, "SELECT usuario_email FROM usuarios WHERE usuario_email = '".$email."'") or exit(mysqli_error($conexao));
        if(mysqli_num_rows($sqlEmail) > 0) {
           
            echo "<script>
                            alert('E-mail já cadastrado.');
                          </script>";
           
        }else{
            
            if (strlen($senha) >= 6){
                if($senha == $confsenha) {
                  $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
                  $result = mysqli_query($conexao, "INSERT INTO usuarios(usuario_nome, usuario_dtNasc, usuario_sexo, usuario_endereco, usuario_pais, usuario_telefone, usuario_email, usuario_senha) 
                                        VALUES('{$nome}', '{$dtNasc}', '{$sexo}', '{$endereco}', '{$pais}', '{$telefone}', '{$email}', '{$senha_criptografada}')");
                  header('Location: login.php');  
                } else {
                    echo "<script>
                            alert('Senhas não conferem.');
                          </script>";
                }
            } else {
                echo "<script>
                        alert('Senha não tem mais de 6 dígitos.');
                      </script>";
            }

        }

    }

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <title>Cadastro</title>
    <style>
        .informations p{
            font-size:25px;
            font-family: "Poppins", sans-serif;
        }
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-color: #2d2d2e;
            padding: 5px 20px;
            border-radius: 5px;
            margin-right: 10px;
            color: white;
            font-size: bold;
        }
        select option{
             background-color: #2d2d2e;
            border:none;
        }
        body{
              background-image:url('./assets/cad.png');
          }

    </style>
</head>

<body>
    <main>
        <nav>
            <h2><a href="#">Mente em Equilibrio</a></h2>
            <ul>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>

        <section>
            <div class="informations">
                <p>Faça seu cadastro<strong class="emphasis">.</strong></p>
                <span>Já possui cadastro? <a class="emphasis" href="login.php">Entrar</a></span>
            </div>

            <form action="" method="POST">
                <div>
                    <div class="small">
                        <span class="details">
                            <h6>Nome completo</h6>
                            <input type="text" name="nome" required >
                        </span>
                        <i class="fas fa-address-card"></i>
                    </div>
                    <div class="small">
                        <span class="details">
                            <h6>Data de nascimento</h6>
                            <input type="date" name="dtNasc" required>
                        </span>
                    </div>
                </div>
                <div>
                    <div class="small">
                        <span class="details">
                            <h6>Digite seu sexo</h6>
                            <!-- <input type="text" name="sexo" required> -->
                            <select name="sexo" id="sexo">
                                <option value=""></option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="O">Outro</option>
                            </select>
                        </span>
                        <i class="fas fa-child"></i> <i class="fas fa-female"></i>
                    </div>
                    <div class="small">
                        <span class="details">
                            <h6>Seu endereço</h6>
                            <input type="text" name="endereco" required>
                        </span>
                        <i class="fas fa-home"></i>
                    </div>
                </div>
                <div>
                    <div class="small">
                        <span class="details">
                            <h6>Seu país</h6>
                            <input type="text" name="pais">
                        </span>
                       <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="small">
                        <span class="details">
                            <h6>Seu telefone</h6>
                            <input type="text" name="telefone" id="" required>
                        </span>
                        <i class="fas fa-phone-alt"></i>
                    </div>
                </div>
                <div>
                    <div class="small">
                        <span class="details">
                            <h6>Email</h6>
                            <input type="email" name="email" required>
                        </span>
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="small">
                        <span class="details">
                            <h6>Senha</h6>
                            <input type="password" name="senha" id="senha" required>
                          
                        </span>
                        <i class="fas fa-eye"  onclick="mostrarSenha()"></i>
                    </div>
                    <div class="small">
                        <span class="details">
                            <h6> Confimar Senha</h6>
                            <input type="password" name="confsenha" id="confsenha" required>
                        </span>
                        <i class="fas fa-eye"  onclick="mostrarSenhaa()"></i>
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" name="submit">Cadastrar</button>
                </div>
            </form>
            <script>
			function mostrarSenha(){
				var tipo = document.getElementById("senha");
				if(tipo.type == "password"){
					tipo.type = "text";
				}else{
					tipo.type = "password";
				}
			}
            function mostrarSenhaa(){
				var tipo = document.getElementById("confsenha");
				if(tipo.type == "password"){
					tipo.type = "text";
				}else{
					tipo.type = "password";
				}
			}
		</script>
        </section>
    </main>

    
    <script src="https://kit.fontawesome.com/03250f1d03.js" crossorigin="anonymous"></script>
</body>

</html>