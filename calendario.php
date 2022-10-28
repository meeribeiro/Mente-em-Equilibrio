<?php
  include_once('conexao.php');
  $hoje = date('Y-m-d');
  $consulta = "SELECT * FROM consultas WHERE consulta_dia >= '{$hoje}'";

  $con = $conexao->query($consulta) or die($conexao->error);

  $nome = $_POST['nome'];
  $dtNasc = $_POST['dtNasc'];
  $sexo = $_POST['sexo'];
  $caixaDemanda = $_POST['caixaDemanda'];
  $praquem = $_POST['praquem'];

?>

<html lang='pt-br'>
  <head>
    <meta charset='utf-8' />
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>

    <script>

       

        document.addEventListener('DOMContentLoaded', function() {
          
         
          document.getElementById("botao").addEventListener("click", function(event){
            if(document.querySelector('#hora').value == '' ||  document.querySelector('#data').value == ''){
              alert('você deve selecionar uma data e hora, clicando no calendário')
              event.preventDefault();
              return;
            }
            return;
           
          });
        //console.log(Date.now())
        const now = new Date        
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'pt-BR',
            weekends:false,
            validRange:{
              start: Date.now(),
              end: Date.now() + (86400000 * 30)
            },
            initialView: 'timeGridWeek',
            allDaySlot: false,
            slotDuration: '01:00:00',
            slotMinTime: '08:00:00',
            slotMaxTime: '20:00:00',
            nowIndicator: true,
            selectOverlap: function(event) {
              data = ''
              console.log(data)
              return event.rendering === 'background';
            },
            selectable: true,
            events: [

              <?php
                 while ($dados = $con->fetch_array()){
                  ?>
                    {
                    title: 'não disponivel',
                    start: '<?php echo $dados["consulta_dia"] ?>T<?php echo $dados["consulta_hora"] ?>-03:00',
                    end: '<?php echo $dados["consulta_dia"] ?>T<?php echo $dados["consulta_hora"] ?>-03:00',
                    backgroundColor: 'rgba(30, 93, 153, 0.781)',
                    borderColor: 'white'
                    },
                  <?php
                }
              ?>
          ]
          
            
        });

        
        calendar.on('dateClick', function(info){
            let data = info.dateStr.substring(0,10)
            let hora = info.dateStr.substring(11,19)
            if(now > info.date){
              alert('você selecionou uma hora já passada, selecione uma hora futura')
              document.querySelector('#hora').value = ''
              document.querySelector('#data').value = ''
            return;
            }
            document.querySelector('#hora').value = hora
            document.querySelector('#data').value = data
        })


        calendar.render();
        quadradinho = document.querySelector('.fc-timegrid-axis')
      });
    </script>

    <style>
         @import url(https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic);
        h1{
            font-size:20px;  
            font-family: "Poppins", sans-serif;
            color:white;
        }
        .color-theme{
            color:rgba(65, 133, 197, 0.87);
            font-weight: bold;
            font-family: "Poppins", sans-serif;
        }
        .container{
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 50px;
            /* background-color:red; */
        }
        .btn{
    background-color:rgba(30, 93, 153, 0.781);
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    border-radius: 7px;
    margin-top: 40px;
   
    cursor: pointer;
}
.btn:hover{
    background-color: rgb(119, 189, 255);
   
}
.btn-main{
    display: flex;
    justify-content: center;
}
 .fc .fc-toolbar-title{
  color:white;
} 
body{
  margin:0;
    background-image:linear-gradient(rgba(0, 0, 0, 0.60),rgba(0,0,0,0.85)), url('./assets/calend.jfif');
    background-size: cover;
    background-position:center;
    background-attachment: fixed;
    height: 100vh;
}
.fc .fc-timegrid-axis-cushion, .fc .fc-timegrid-slot-label-cushion {
  color:black;
}
.fc .fc-col-header-cell-cushion {
  color:black;
}
.fc .fc-button:disabled {
    color:white;
}
.fc .fc-scrollgrid{
  background-color:white;
}
    </style>
  </head>
  <body>
 
      <div class="container">
     
      <br>
      <form action="modalidade.php" method="POST">
      <br><br><br>
          <h1>Selecione a data clicando no calendário a baixo! </h1><br>
          <input type="hidden" name="nome" value="<?php echo $nome ?>">
          <input type="hidden" name="dtNasc" value="<?php echo $dtNasc ?>">
          <input type="hidden" name="sexo" value="<?php echo $sexo ?>">
          <input type="hidden" name="praquem" value="<?php echo $praquem ?>">
          <input type="hidden" name="caixaDemanda" value="<?php echo $caixaDemanda ?>">
          <span class="color-theme" >Data</span>
          <input type="text" name="data" id="data" value=""  readonly="readonly">
          <span class="color-theme" >Horário</span>
          <input type="text" name="hora" id="hora" value=""  readonly="readonly">
          <br><br>
          <div class="buttons">
                    <button class="btn" type="submit" id="botao" name="submit">Confirmar</button>
                </div>
                <br><br>
                <div id='calendar'></div>
        </form> 
       

        
      </div>
  </body>
</html>