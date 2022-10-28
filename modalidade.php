<?php
    if(isset($_POST['submit']))
    {
        include_once('acoes/verifica.php');
        //print_r($_POST['nome']);
        //include_once('conexao.php');

        $nome = $_POST['nome'];
        $dtNasc = $_POST['dtNasc'];
        $sexo = $_POST['sexo'];
        $caixaDemanda = $_POST['caixaDemanda'];
        $praquem = $_POST['praquem'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];

        if($praquem == 'Familiar'){
            $nome = 'Familia';
        }
        if($praquem == 'Para mim'){
            $nome = 'Individual';
 }


    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <title>Modalidade</title>
    <style>
        *{
            margin:0;
            padding:0;
            font-family:sans-serif;
        }
        .banner{
            width:100%;
            height:100vh;
            background-image:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(assets/login.png);
            background-size:cover;
            background-position:center;
            font-size:13px;
        }
        .navbar{
            width:85%;
            margin:auto;
            padding:35px 0;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .logo{
            width:150px;
            cursor:pointer;
        }
        .navbar ul li{
            list-style:none;
            display:inline-block;
            margin:0 20px;
            position:relative;
        }
        .navbar ul li a{
            text-decoration:none;
            color:#fff;
            text-transform:uppercase;
        }
        .navbar ul li::after{
            content:'';
            height:3px;
            width:0;
            background:rgb(119, 189, 255);
            position:absolute;
            left:0;
            bottom:-10px;
            transition:0.5s;
        }
        .navbar ul li:hover::after{
            width:100%;
        }
        #login-container{
            background-color: #fff;
            width: 400px;
            margin-left: auto;
            margin-right: auto;
            padding: 8px 30px;
            margin-top: 1vh;
            border-radius: 10px;
            text-align:center;
        }
        form{
            margin-top: 10px;
            margin-bottom: 40px;
        }
        p{
            margin-top:10px;
            font-size: 20px;
            color: #191a1a;
            font-family:Arial, Helvetica, sans-serif;
        }
        .button{
            width:100px;
            padding:5px 0;
            text-align:center;
            margin:10px 10px;
            border-radius:20px;
            border:2px solid rgb(119, 189, 255);
            background:transparent;
            color:rgb(0, 0, 0);
            cursor:pointer;
            position:relative;
            overflow:hidden;
        }
        span{
            background:rgb(119, 189, 255);
            height:100%;
            width:0;
            border-radius:25px;
            position:absolute;
            left:0;
            bottom:0;
            z-index:-1;
            transition:0.5s;
        }
        button:hover span{
            width:100%;
            background-color: #69c4f8;
        }
        button:hover{
            border:none;
        }
        input{
           position:center;
        }
        .obs p{
            text-align: left;
            font-size: 14px;
            font-family:Arial, Helvetica, sans-serif;
        }
        .obs h3{
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="assets/logo.png" class="logo">
            
        </div>
        <div id="login-container">
           
        <p>Qual modalidade de atendimento</br>você deseja ter?</p>
          
        <form action="finalizado.php" method="POST">
        <input type="hidden" name="nome" value="<?php echo $nome ?>">
        <input type="hidden" name="dtNasc" value="<?php echo $dtNasc ?>">
        <input type="hidden" name="data" value="<?php echo $data ?>">
        <input type="hidden" name="hora" value="<?php echo $hora ?>">
        <input type="hidden" name="sexo" value="<?php echo $sexo ?>">
        <input type="hidden" name="praquem" value="<?php echo $praquem ?>">
        <input type="hidden" name="caixaDemanda" value="<?php echo $caixaDemanda ?>">
    </br>
    <div>
    <input type="radio"  name="modalidade" value="Presencial" checked>
  <label for="vehicle1">Presencial</label><br></br>

  <input type="radio"  name="modalidade" value="Online">
  <label for="vehicle2">Online</label><br></br>


<div id="escolhas-online" style="display:none;">
    <input type="radio" name="plataforma" value="WhatsApp" checked>
    <label for="contactChoice2">WhatsApp</label>

    <input type="radio" name="plataforma" value="Meet">
    <label for="contactChoice3">Meet</label>

    <input type="radio" name="plataforma" value="Zoom">
    <label for="contactChoice3">Zomm</label>

    <input type="radio" name="plataforma" value="Instagram">
    <label for="contactChoice3">Instagram</label>
</div>
  </div>
</br>
<div class="obs">
    <h3> Instruções importantes pra a consulta online:</h3>
    <p>- estar num ambiente calmo e sozinha(o);</p>
    <p>- não mexer no celular;</p>
    <p>- usar fones de ouvido;</p>
    <p>- estar num ambiente com uma iluminação boa;</p>
    <p>- usar uma internet instável;</p>
    <p>- escolher a plataforma online que deseja ter a consulta;</p>
    <p>- entrar em contato pelo número de celular  <strong>(51) 94752230</strong> para</br>ver a melhor forma de pagamento para realizar a consulta.</p>
</div>
        <center> <input class="button" type="submit" name="submit" value="Continuar"></center>
</div>
        </form>
    </div>
</div>
   
</body>

<script type="text/javascript" src="js/script-modalidade.js"></script>
</html>
