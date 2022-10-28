<?php
        require("conexao.php");
        require("acoes/verifica_admin.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Menu</title>
     <link rel="stylesheet" href="./stylesheet/styleMenu.css">
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
<style>
    main{
    background-image:linear-gradient(rgba(0, 0, 0, 0.815),rgba(0,0,0,0.75)), url('./assets/menu.png');
    background-size: cover;
    background-position:center;
    background-attachment: fixed;
    height: 100vh;
}
body{
    margin:0;
    padding:0;
}
    </style>
</head>
<body>
    <main>
    <div class="banner">
        <div class="navbar">
            <img src="./assets/logo.png" class="logo">
            <ul>
                <li><a href="home.php">Inicio</a></li>
                <li><a href="verConsultas.php">Visualizar consultas</a></li>
                <li><a href="perfil.html">Perfil</a></li>
            </ul>
        </div>        
       <ul>
           <li>
             <img class="foto1"src="./assets/consultaa.png" width="400">
             <a href="aprovarConsultas.php">  <h2 class="h21">Consultas aguardando aprovação</h2></a>
            </li>
           <li>
             <img class="foto2"src="./assets/consultaa.png" width="400">
             <a href="verConsultas.php"> <p class="h22">Ver consultas marcadas</p></a>
            </li>
           <li>
            <img class="foto3" src="./assets/perfill.png" width="400">
            <a href="perfil.html"> <h2 class="h2">Visualizar perfil</h2></a>
        </li>
       </ul>
    </div>   
</main>
</body>
</html>