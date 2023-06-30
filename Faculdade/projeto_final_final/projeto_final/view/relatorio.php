<?php
include "../conn/conex.php";
?>

<html>
   <head>
      <title>Google Charts Tutorial</title>
      <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js">
      </script>
      <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
   </head>
   
   <body>
      <div id = "container" style = "width: 550px; height: 400px; margin: 0 auto">
      </div>
      <script language = "JavaScript">
         function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
               ['Usuario', 'arrayToDataTable'],

              <?php
           

            // Query para selecionar os dados da tabela
            $sql = $pdo->prepare("SELECT sum(total) as total, email FROM `tbl_compra`group by email");
            $result = $sql->execute();
            $rowtabela = $sql->fetchAll(); 
            
              foreach ($rowtabela as $row){
                    echo "['$row[email]',  $row[total]],";
                    
                }
            
            

            
            ?>


             
               
            ]);

            var options = {title: 'Valor em Vendas'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.BarChart(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
   </body>
</html>