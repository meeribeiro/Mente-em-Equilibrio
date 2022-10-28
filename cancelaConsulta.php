<?php
    require("acoes/verifica_admin.php");
    if(!empty($_GET['id']))
    {
        include_once('conexao.php');

        $id = $_GET['id'];
        $user = $_GET['user'];

        $sqlSelect = "SELECT *  FROM consultas WHERE consulta_id=$id";

        $result = $conexao->query($sqlSelect);

        while($dado = $result->fetch_assoc()) {
            $data = $dado['consulta_dia'];
            $hora = $dado['consulta_hora'];
        };

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM consultas WHERE  consulta_id=$id";
            $resultDelete = $conexao->query($sqlDelete);
            header("Location: enviarEmail.php?user=$user&situacao=cancelada&consulta=$id&data=$data&hora=$hora");
        }
    }
   
   
?>