<?php
    include_once('conexao.php');
    $hoje = date('Y-m-d');
    require('acoes/verifica.php');
    $consulta = "SELECT c.*, u.usuario_nome
    FROM consultas c
    INNER JOIN usuarios u ON c.consulta_usuario_id = u.usuario_id WHERE consulta_usuario_id = $_SESSION[id] AND c.consulta_dia >= '{$hoje}'";

    $con = $conexao->query($consulta) or die($conexao->error);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheet/styleVisualizar.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    <title>Meus Agendamentos</title>
    <style>
      .table{
        margin-top:120px;
      }
      p{
        margin-top:50px;
        margin-left:30px;
      }
    </style>
</head>
<body>
<table class="table">
        <p>Meus agendamentos<strong class="emphasis">.</strong></p>
          <thead>
            <tr>
              <th>Usuário</th>
              <th>Hora</th>
              <th>Dia</th>
              <th>Modalidade</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php
                    while ($dado = $con->fetch_array()){
                        if($dado["consulta_aprovada"] == 0){
                          $status_consulta  = 'Aguardando Aprovação';
                        }else if($dado["consulta_aprovada"] == 1){
                          $status_consulta  = 'Aprovada';
                        }else if($dado["consulta_aprovada"] == 2){
                          $status_consulta  = 'Cancelada';
                        }else{
                          $status_consulta  = 'Entre em contato';
                        }
                       
                      ?>
                        <td> <?php echo $dado["usuario_nome"];?></td>
                        <td><?php echo $dado["consulta_hora"];?></td>
                        <td><?php echo date("d/m/Y", strtotime($dado["consulta_dia"])); ?></td>  
                        <td><?php echo $dado["consulta_modalidade"]; ?></td>
                        <td><?php echo $status_consulta; ?></td> 
                    </tr>
                   <?php }?>
             
          </tbody>
        </table>
</body>
</html>