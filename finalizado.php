
<?php
    if(isset($_POST['submit']))
    {
        //print_r($_POST['nome']);
        include_once('conexao.php');
        include_once('acoes/verifica.php');

        $nome = $_POST['nome'];
        $dtNasc = $_POST['dtNasc'];
        $sexo = $_POST['sexo'];
        $caixaDemanda = $_POST['caixaDemanda'];
        $praquem = $_POST['praquem'];
        $modalidade = $_POST['modalidade'];
        $plataforma = $_POST['plataforma'];
        $usuario_id  = $_SESSION['id'];
        $data = $_POST['data'];
        $hora = $_POST['hora'];


        if($modalidade == 'Presencial'){
           $plataforma = 'consultorio';
        }

        

        $result = mysqli_query($conexao, "INSERT INTO consultas (consulta_nome, consulta_dtNasc, consulta_sexo, consulta_demanda, consulta_praquem, consulta_dia, consulta_hora, consulta_modalidade, consulta_plataforma, consulta_usuario_id) 
        VALUES('$nome', '$dtNasc', '$sexo', '$caixaDemanda', '$praquem', '$data', '$hora', '$modalidade', '$plataforma','$usuario_id')");
        //header('Location: home.php');
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizado!</title>
    <style>
        *{
            margin:0;
            padding:0;
            font-family:sans-serif;
        }
        .emphasis {
    color: #69c4f8;
    font-weight: 700 !important;
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
        .btn{
    background-color:rgba(119, 189, 255, 0.87);
    border: none;
    padding: 10px 20px;
    font-size: 17px;
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    border-radius: 7px;
    margin-top: 40px;
    transition: 1s;
    cursor: pointer;
}
.btn-main{
    display: flex;
    justify-content: center;
}
    </style>
</head>
    <body>
        <div class="banner">
            <div class="navbar">
                <img src="assets/logo.png" class="logo">  
            </div>
            <div id="login-container">
                <?php if($result == 1){
                ?>


            <p>Agendamento em espera<strong class="emphasis">.</strong></p><br>
            <div class="obs">
                <h3>Informações sobre o seu agendamento:</h3>
                <p>Você recebera um e-mail confirmando seu agendamento <?php $_SESSION['nome'] ?><br>
                <br> para o dia <?php echo $data?> as <?php echo $hora?> 
                <br><br></p>
            </div>
            <div class="btn-main">
                <center> <a href="home.php"><button class="btn">Concluido</button></a></center>
                </div>
                <?php
                }else{
                ?>

                <h3>Houve um problema:</h3>
                <p>algo de errado aconteceu com sua consulta e não foi possivel salvar<br> 
                <br><br>tente novamente mais tarde!</p>
            </div>
            <div class="btn-main">
                <center> <a href="home.php"><button class="btn">Concluido</button></a></center>
                </div>


                <?php
                } 
                ?>

            </div>
            
            </div>
        </div>
    </body>
</html>