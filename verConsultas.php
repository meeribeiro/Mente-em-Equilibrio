<?php
    include_once('conexao.php');
    $hoje = date('Y-m-d');
    require('acoes/verifica_admin.php');
    $consulta = "SELECT c.*, u.usuario_nome, u.usuario_email
    FROM consultas c
    INNER JOIN usuarios u ON c.consulta_usuario_id = u.usuario_id
    WHERE c.consulta_dia >= '{$hoje}'";

    $con = $conexao->query($consulta) or die($conexao->error);

    $temConsulta = false;
 
 
?>
<html lang="en">
<head>
  <title>Ver consultas</title>
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
  #mostrarTudo{
    margin-left:5px;
    color:white;
    background-color:transparent;
    border-color:transparent;
  }
  #mostrarTudo:hover{
    color: rgb(119, 189, 255);
    transition: 0.1s;
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
        <p>Consultas marcadas<strong class="emphasis">.</strong></p> <input type="date" name="filtro_data" onchange="atualizaListagem(this)" id="filtro_data" >
          <button id="mostrarTudo">Mostrar tudo</button>
          <br>
        <thead>
        <br>
            <tr>
              <th>Usuário</th>
              <th>Atendimento</th>
              <th>Contato</th>
              <th>Motivo</th>
              <th>Modalidade</th>
              <th>Local</th>
              <th>Dia</th>
              <th>Horario</th>
              <th>  <center> status </center> </th> 
            </tr>
          </thead>
          <tbody id="tabela">
            <?php
                    while ($dado = $con->fetch_array()){
                      if($dado["consulta_aprovada"] == 0){
                        $status_consulta  = 'Aguardando Aprovação';
                      }else if($dado["consulta_aprovada"] == 1){
                        $status_consulta  = 'Aprovada';
                      }else if($dado["consulta_aprovada"] == 2){
                        $status_consulta  = 'Cancelada';
                      }else{
                        $status_consulta  = 'Houve um erro';
                      }


                      if($dado["consulta_aprovada"] == 1 || $dado["consulta_aprovada"] == 2 ){
                        $temConsulta = true; 
                      if ($dado["consulta_dia"] < date('Y-m-d')){
                        $background='#ff37376e';
                      }else if ($dado["consulta_dia"] == date('Y-m-d')){
                        $background='#B5DEFF';
                      }else{
                        $background='transparent';
                      }

                      if($dado["consulta_aprovada"] == 1 ){
                        $background ='orange';
                      }
                      ?>
                        <tr class="consulta_linha" key="<?php  echo date("d/m/Y", strtotime($dado["consulta_dia"])); ?>" style="background-color:<?php echo $background ?>"> 
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
                            <td><?php  echo date("d/m/Y", strtotime($dado["consulta_dia"])); ?></td>
                            <td><?php echo $dado["consulta_hora"]; ?></td>
                            <td><?php echo $status_consulta; ?></td>
                           <!--- <td class="acao"> <center> <a href="javascript: confirmar(delete.php?id=<php echo $dado['consulta_id'] ?>)"> remover </a> </center> </td> -->
                           
                          
                    </tr>
                   <?php }}?>
             
          </tbody>
        </table>
        <?php 
        if(!$temConsulta){
          echo  "<p> Nenhuma Consulta encontrada, tente ver a pagina de consultas aguardando aprovação</p>";
        } ?>
      </div>
     
                    </form>
    </section>
  </main>
  <script type="text/javascript">

    function confirmar(consulta_id){
     //alert(`essa é a consulta id ${consulta_id}`)
      let resposta = confirm("Deseja excluir essa consulta?")
      if (resposta === true){
        window.location.href=`delete.php?id=${consulta_id}`
        alert(`você removeu a consulta ${consulta_id}`)
       
      }

    
    }

  </script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<script>
  let linhas = document.querySelectorAll(".consulta_linha")
  let tabela = document.querySelector("#tabela")
  let btMostraTudo = document.querySelector("#mostrarTudo")

  btMostraTudo.addEventListener('click', e=>{
    e.preventDefault()
    limpaListagem()
    linhas.forEach(linha=>{
      tabela.appendChild(linha)
    })
  })
  //console.log(tabela)
  //console.log(linhas)

  function atualizaListagem(data){
    let dataInput = data.value;
    date = new Date(dataInput);
    dataFormatada = date.toLocaleDateString('pt-BR', {timeZone: 'UTC'});
    
    let linhasSelecionadas = Array.from(linhas).filter(el=>{
      return el.attributes.key.nodeValue == dataFormatada
    })

    limpaListagem()
    linhasSelecionadas.forEach(linha=>{
      tabela.appendChild(linha)
    })
    


  }

  function limpaListagem(){
    linhas.forEach(el =>{
      el.remove();
    })
  }

  

  
</script>
</body>
</html>



