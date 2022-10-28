
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
         .h2{
            margin-left:180px;
         }
         a {
    cursor: pointer;
    color: #f2f2f2;
    text-decoration: none;
    font-weight: 500;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    transition: all 0.4s;
    color: #a5a5a5;
    text-decoration: underline;
}
         </style>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="./assets/logo.png" class="logo">
            <li><a href="home.php">Home</a></li>
            
        </div>        
       <ul>
           <li>
             <img class="foto1"src="./assets/consultaa.png" width="500">
             <a href="formulario.php">  <p>Marcar consulta</p></a>
            </li>
           <li>
            <img class="foto2" src="./assets/perfill.png" width="500">
            <a href="meusAgendamentos.php"> <h2>Ver meus agendamentos<h2></a>
        </li>
       </ul>
    </div>   
</body>
</html>