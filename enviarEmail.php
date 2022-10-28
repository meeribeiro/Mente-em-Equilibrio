<?php
 if(!empty($_GET['user']))
 {
    include_once('conexao.php');

    $user = $_GET['user'];
    $situacao = $_GET['situacao'];
    $consulta = $_GET['consulta'];
    $data = $_GET['data'];
    $hora = $_GET['hora'];

    $sql = "SELECT usuario_nome, usuario_email FROM usuarios WHERE usuario_id=$user";
    $consulta = "SELECT * FROM consultas WHERE consulta_id=$consulta";
    $result = $conexao->query($sql);
    $resultConsulta = $conexao->query($consulta);

    if ($result->num_rows > 0) {
        while($dado = $result->fetch_assoc()) {
            $para = $dado['usuario_email'];
            $assunto = "Atualização de consulta Mente em Equilibrio";
            $corpo = "Olá " . $dado['usuario_nome'] . ", sua consulta no dia ".date("d/m/Y", strtotime($data))." as ".$hora." em Mente em Equilibrio foi " . $situacao;
            $headers = "From:email@gmail.com"; //Sustituir pelo e-mail a ser utilizado.

            if(mail($para, $assunto, $corpo, $headers)){
                header('Location: aprovarConsultas.php');
               
            }else{
                echo "ouve um problema no envio do email.";
            }
        }
    } else {
        echo "0 results";
    }
    $conexao->close();
 }

?>