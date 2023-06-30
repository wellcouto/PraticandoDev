<?php
include "../../conn/conex.php";
include "../restrito_admin.php";

// Consulta SQL para obter os dados da tabela
$sql = $pdo->prepare("SELECT email, SUM(total) total FROM tbl_compra GROUP BY email");
$sql->execute();
$comprasValor = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare("SELECT tbl_compra.email email, SUM(tbl_compra.total/tbl_produto.valor) quantidade FROM tbl_compra INNER JOIN tbl_produto WHERE tbl_compra.id_produto = tbl_Produto.id GROUP BY email");
$sql->execute();
$comprasQuantidade = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $pdo->prepare("SELECT tbl_produto.nome as nome, (tbl_compra.total/tbl_produto.valor) as quantidade FROM tbl_compra INNER JOIN tbl_produto WHERE tbl_compra.id_produto = tbl_Produto.id");
$sql->execute();
$produtosCompras = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa</title>
    <style>
      @import '../css/global.css';
      @import '../css/button.css';
  .container{
    width:100%;
    padding:2rem;
    gap:3rem;
    height:auto;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
  }
    h1 {
      text-align: center;
      font-weight: 400 !important;
      font-size: 4rem !important;
      }

    .back {
    font-size: 2.5rem !important;
    color: white !important;
    text-decoration: none !important;
    }
    .bars{
      width:100%;
      height:80rem;
    }
    .barcontainer{
      width:100% !important;
      height:auto !important;
    }
    @media screen and (max-width:768px){
      .my-4{
        font-size: 3rem !important;
      }
      .bars{     
      height:50rem;
      width:80rem;
      }
      .barcontainer{
        overflow-x:scroll;
        overflow-y:hidden !important;
      }
    }
    @media screen and (max-width:425px){
      .bars{
      height:30rem;
    }
    }
    </style>
      <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.google.com/jsapi"></script>
   

</head>
<body>
          <div class="container">
            <button class="button"><a class='back' href='../home/home_admin.php'>Voltar ←</a></button>
            <h1 class="my-4">Clientes que mais compraram por Valor</h1>
            <div class="barcontainer">
              <div class="bars" id="barchart_values_compras_valor"  ></div>
            </div>
            <h1 class="my-4">Clientes que mais compraram por Quantidade</h1>
            <div class="barcontainer">
              <div class="bars" id="barchart_values_compras_quantidade"  ></div>
            </div>
            <h1 class="my-4">Produtos Mais Vendidos</h1>
            <div class="barcontainer">
              <div class="bars" id="barchart_values_produtos"></div>
            </div>
          </div>

     <script>
          google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart1);
    function drawChart1() {
      var elementos = [["Consumidor", "Valor", { role: "style" } ]];
      var indice = 0
      const cores = ['#fff100','#ff8c00','#e81123','#ec008c']
      <?php foreach($comprasValor as $compra): ?>
        elementos.push(['<?php echo $compra["email"] ?>', <?php echo $compra["total"] ?>, cores[indice]],)
        indice++
       <?php endforeach; ?>
      var data = google.visualization.arrayToDataTable(elementos);
    
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        bar: {groupWidth: "100%"},
        legend: { position: "none" }, 
        
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values_compras_valor"));
      chart.draw(view, options);
  }

          google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart2);
    function drawChart2() {
      var elementos = [["Produto", "Quantidade", { role: "style" } ]];
      var indice = 0
      const cores = ['#fff100','#ff8c00','#e81123','#ec008c']
      <?php foreach($produtosCompras as $compra): ?>
        elementos.push(['<?php echo $compra["nome"] ?>', <?php echo (int)$compra["quantidade"] ?>, cores[indice]],)
        indice++
       <?php endforeach; ?>
      var data = google.visualization.arrayToDataTable(elementos);
    
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        bar: {groupWidth: "100%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values_produtos"));
      chart.draw(view, options);
  }

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart3);
    function drawChart3() {
      var elementos = [["Email", "Quantidade", { role: "style" } ]];
      var indice = 0
      const cores = ['#fff100','#ff8c00','#e81123','#ec008c']
      <?php foreach($comprasQuantidade as $compra): ?>
        elementos.push(['<?php echo $compra["email"] ?>', <?php echo (int)$compra["quantidade"] ?>, cores[indice]],)
        indice++
       <?php endforeach; ?>
      var data = google.visualization.arrayToDataTable(elementos);
    
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        bar: {groupWidth: "100%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values_compras_quantidade"));
      chart.draw(view, options);
  }
  window.addEventListener("resize", ()=>{
    drawChart1()
    drawChart2()
    drawChart3()
  });

     </script>

</body>
</html>