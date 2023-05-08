<?php
try {
  $dbh = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
} catch (PDOException $e) {
  echo "Erreur de connexion : " . $e->getMessage();
}

$query = "SELECT prixCmd, count(numCmd) FROM commande group by prixCmd";
$res = $dbh->query($query);

?>

<html>
  <head>
    <style>
      body {
        background-color: #f8f8f8;
        font-family: Arial, sans-serif;
      }
      
      h1 {
        font-size: 30px;
        font-weight: bold;
        color: #3c3c3c;
        text-align: center;
        margin-top: 50px;
      }
      
      #piechart {
        width: 900px;
        height: 500px;
        margin: 50px auto;
      }
      
      input[type="submit"] {
        background-color: red;
        color: white;
        font-size: 18px;
        font-weight: bold;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }
      
      input[type="submit"]:hover {
        background-color: #c40000;
      }
    </style>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['prixCmd', 'prix d\'commandes'],
          
          <?php 
            while($row=$res->fetch(PDO::FETCH_ASSOC))
            {
                echo "['".$row['prixCmd']."',".$row['count(numCmd)']."],";
            }
          ?>

        ]);

        var options = {
          title: 'Statistiques Des Commandes Par Prix',
          backgroundColor: { fill:'transparent' },
          titleTextStyle: {
            fontSize: 30,
            fontName: 'Roboto',
            bold: true,
            color: '#3c3c3c',
            alignment: 'center'
          },
          is3D: true,
          legend: {
            textStyle: {
              fontSize: 18,
              fontName: 'Roboto',
              color: '#3c3c3c'
            }
          }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
  <button onclick="goBack()" style="background-color: #ff0000; color: #fff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Go Back</button>

<style>
    button:hover {
        background-color: #ff6666;
    }
</style>

<script>
    function goBack() {
        window.history.back();
    }
</script>
    <form method="post" action="stat.php" align="center">
        <input type="submit" name="stat" value="↻">
    </form>
    <div id="piechart"></div>
  </body>
</html>