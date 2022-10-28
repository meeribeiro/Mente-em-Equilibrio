<?php
session_start();
if(isset($_SESSION["adm"]) == 1){
header("Location: menupsico.php");
exit;}
?>
<!DOCTYPE html>
<html lang="pt-BR">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet/styleadm.css">
    <title>Página de Login</title>
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
                <h1>Faça seu login adm<strong class="emphasis">.</strong></h1>
               </div>

            <form action="acoes/loginpsico.php"  method="POST">
                <div>
                    <div class="small">
                        
                       
                    </div>
                    <div class="small">
                        
                       
                    </div>
                </div>
                <div class="large">
                    <span class="details">
                        <h6>Email</h6>
                        <input type="email" name="email" id="">
                    </span>
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="large">
                    <span class="details">
                        <h6>Senha</h6>
                        <input type="password" name="senha" id="">
                    </span>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="buttons">
                    <button type="submit" name="submit">Entrar</button>
                </div>
            </form>
        </section>
    </main>

    <script src="https://kit.fontawesome.com/03250f1d03.js" crossorigin="anonymous"></script>
</body>

</html>

