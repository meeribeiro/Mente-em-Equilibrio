<?php include_once('acoes/verifica.php'); 


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet/style.css">
    <title>Formulário</title>
<style>
        body{
            background-image:url('./assets/form.png');
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
        .campo p{
            text-align: left;
            font-size:15px;  
        }
        input, label{
        margin-right: 15px;
        line-height: 32px;
        font-size: 12px;
        }
</style>
</head>

<body>
    <main>
        <nav>
           
            <ul>
                <li><a href="home.php">Home</a></li>
            </ul>
        </nav>

        <section>
            <div class="informations">
                <h2>Preencha o formulário<strong class="emphasis">.</strong></h2>
    </div>

            <form action="calendario.php" method="POST">
                <p>Pra quem é a consulta?</p>
                <div class="campo">
                    
               
    </br>
                <label>Para mim
                <input type="radio" name="praquem" value="Para mim" checked>
                </label>
                <label>Para outra pessoa
                <input type="radio" name="praquem" value="Para outra pessoa">
                </label>
                <label>Casal 
                <input type="radio" name="praquem" value="Casal">
                </label>
                <label>Familiar 
                <input type="radio" name="praquem" value="Familiar">
                </label>
            </div>
                <div>
                    <div style="display:none;" id="nome-div" class="small">
                        <span class="details">
                            <h6 id="nome-text">Nome do paciente</h6>
                            <input type="text" name="nome" id="nome-input"  >
                        </span>
                        <i class="fas fa-address-card"></i>
                    </div>
                    <div style="display:none;" id="dtNasc-div" class="small">
                        <span class="details">
                            <h6>Data de nascimento</h6>
                            <input type="date" name="dtNasc" id="dtNasc-input"  >
                        </span>
                    </div>
                </div>
                <div>
                    <div  style="display:none;" id="sexo-div" class="small">
                        <span class="details">
                            <h6>Sexo do paciente</h6>
                            <select name="sexo" id="sexo">
                                <option value=""></option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                <option value="O">Outro</option>
                            </select>
                        </span>
                    </div>
                    </div>
               <p for="caixaDemanda" id="desc">Diga o motivo da sua procura pela profissional e, caso já tenha ido em alguma, conte sua expêriencia: </p></label>  </br> 
                  <textarea rows="3" style="width: 26em" name="caixaDemanda"  required></textarea>
                
                <div class="buttons">
                    <button type="submit" name="submit">Selecionar Horário</button>
                </div>
            </form>
        </section>
    </main>

    <script src="https://kit.fontawesome.com/03250f1d03.js" crossorigin="anonymous"></script>
</body>

<script type="text/javascript" src="js/script-consulta.js"></script>

</html>