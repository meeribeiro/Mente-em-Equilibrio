<?php
    require("acoes/verifica_admin.php");
    if(!empty($_GET['id']))
    {
        include_once('conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM consultas WHERE consulta_id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM consultas WHERE  consulta_id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: verConsultas.php');
   
?>