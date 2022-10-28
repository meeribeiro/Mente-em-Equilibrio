


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mente em Equilibrio</title>
    <link rel="stylesheet" href="./stylesheet/styleHome.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="container">
             <img src='./assets/logo.png' class="logo">
             <ul>
             <?php
                session_start();
                if(isset($_SESSION["adm"]) == 1){?>
                <a class="item-nav" href="home.php"><li>Inicio</li></a>
                <a class="item-nav" href="perfil.html"><li>Perfil Psicologa</li></a>
                <a class="item-nav" href="admin.php"><li>Admin</li></a>
                <a class="item-nav" href="./acoes/logout.php"><li>Sair</li></a>
            <?php
                }else if(isset($_SESSION['id'])){
            ?>
                <a class="item-nav" href="home.php"><li>Inicio</li></a>
                <a class="item-nav" href="formulario.php"><li>Marcar Consulta</li></a>
                <a class="item-nav" href="menu.php"><li>Menu</li></a>
                <a class="item-nav" href="perfil.html"><li>Perfil Psicologa</li></a>
                <a class="item-nav" href="./acoes/logout.php"><li>Sair</li></a>
            <?php
                }else{
            ?>
                <a class="item-nav" href="home.php"><li>Inicio</li></a>
                <a class="item-nav" href="login.php"><li>Login</li></a>
                <a class="item-nav" href="cadastro.php"><li>Cadastre-se</li></a>
                <a class="item-nav" href="perfil.html"><li>Perfil Psicologa</li></a>
                <a class="item-nav" href="admin.php"><li>Admin</li></a>
            <?php
                }
            ?>
          
               
            </ul>
        </div>
    </nav>

    <main>
        <div class="corpo">
            <h1 class="text-main" >Faça a sua marcação de consulta online <br> Mente Em <span class="color-theme" >Equilibrio</span></h1>
        </div>
        <div class="desc">
            <p class="desc-main" >A melhor plataforma para agendar uma consulta com a sua psicologa.</p>
        </div>
        <div class="btn-main">
           <a href="login.php"> <button class="btn">Contato</button></a>
        </div>
    </main>
     
</body>
</html>
