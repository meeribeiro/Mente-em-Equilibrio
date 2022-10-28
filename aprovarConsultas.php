<?php
    include_once('conexao.php');
    require('acoes/verifica_admin.php');
    $consulta = "SELECT c.*, u.usuario_nome, u.usuario_email
    FROM consultas c
    INNER JOIN usuarios u ON c.consulta_usuario_id = u.usuario_id";

    $con = $conexao->query($consulta) or die($conexao->error);

    $temConsulta = false;
 
?>
<html lang="en">
<head>
  <title>Agendamentos em espera</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./stylesheet/styleVisualizar.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
<style>
  a{
    display:block;
    color:#f2f2f2;
    font-weight:bold;
    text-decoration: none;
    font-family: "arial", sans-serif;
  }
  
</style> 
</head>

<body>
  
  <main>
    <section>
   <div class="buttons">
     <a href="menupsico.php">Voltar</a>
    </div>
    <form action="modalidade.php" method="POST">
     
    </br>
      <div class="container">           
        <table class="table">
        <p>Confirmar Agendamentos <strong class="emphasis">.</strong></p>
          <thead>
            <tr>
              <th>Usuário</th>
              <th>Atendimento</th>
              <th>Contato</th>
              <th>Motivo</th>
              <th>Modalidade</th>
              <th>Local</th>
              <th>Dia</th>
              <th>Horario</th>
              <th>  <center> Ações </center> </th>
            </tr>
          </thead>
          <tbody>
            <?php
                    while ($dado = $con->fetch_array()){
                    $temConsulta = true;
                    if($dado["consulta_aprovada"] == 0){
                      if ($dado["consulta_dia"] < date('Y-m-d')){
                        $background='#ff37376e';
                      }else if ($dado["consulta_dia"] == date('Y-m-d')){
                        $background='#B5DEFF';
                      }else{
                        $background='transparent';
                      }
                      ?>
                        <tr style="background-color:<?php echo $background ?>"> 
                            <td> <?php echo $dado["usuario_nome"];?></td>
                            <?php 
                              if($dado["consulta_praquem"] == "Para outra pessoa"){
                                echo '<td> <span>Para outra pessoa - nome:</span>'.$dado["consulta_nome"].'</td>';
                              }else if($dado["consulta_praquem"] == "Casal"){
                                echo '<td> <span>Casal - conjuge:</span>'.$dado["consulta_nome"].'</td>';
                              }else{
                                echo '<td>'.$dado["consulta_nome"].'</td>';
                              }
                            ?>
                            <td> <?php echo $dado["usuario_email"];?></td>
                            <td><?php echo $dado["consulta_demanda"];?></td>
                            <td><?php echo $dado["consulta_modalidade"]; ?></td>
                            <td><?php echo $dado["consulta_plataforma"]; ?></td>
                            <td><?php echo date("d/m/Y", strtotime($dado["consulta_dia"])); ?></td>
                            <td><?php echo $dado["consulta_hora"]; ?></td>
                            <td><center> <a style="color:green" href="aprova.php?id=<?php echo $dado['consulta_id'] ?>&user=<?php echo $dado['consulta_usuario_id'] ?>">Aprovar</a> <button type="button" class="btn btn-link" onclick="confirmar(<?php echo $dado['consulta_id'] ?>, <?php echo $dado['consulta_usuario_id'] ?>)">Cancelar</button></center></td>
                           <!--- <td class="acao"> <center> <a href="javascript: confirmar(delete.php?id=<php echo $dado['consulta_id'] ?>)"> remover </a> </center> </td> -->
                           
                          
                    </tr>
                   <?php }} ?>
             
          </tbody>
        </table>
        <?php
        if(!$temConsulta){
          echo  "<p> Nenhuma consulta aguardando aprovação</p>";
        } ?>
      </div>
     
                    </form>
    </section>
  </main>
  <script type="text/javascript">

    function confirmar(consulta_id, user_id){
     //alert(`essa é a consulta id ${consulta_id}`)
      let resposta = confirm("Deseja cancelar essa consulta?")
      if (resposta === true){
        window.location.href=`cancela.php?id=${consulta_id}&user=${user_id}`
        //alert(`você removeu a consulta ${consulta_id}`)
       
      }

    
    }

  </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>



