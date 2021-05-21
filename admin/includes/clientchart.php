<?php
  include ("includes/config.admin.php");
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Customers'],
          
            <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-01-01' AND '2020-01-31'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'JAN'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-02-01' AND '2020-02-29'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'FEB'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-03-01' AND '2020-03-31'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'MAR'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-04-01' AND '2020-04-30'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'APR'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-05-01' AND '2020-05-31'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'MAY'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-06-01' AND '2020-06-30'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'JUN'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-07-01' AND '2020-07-31'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'JUL'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-08-01' AND '2020-08-31'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'AUG'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-09-01' AND '2020-09-30'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'SEP'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-10-01' AND '2020-10-31'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'OCT'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-11-01' AND '2020-11-30'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'NOV'."', ".$row['Clients']."],";
                  }
                }
            ?>
             <?php
                $sql = "SELECT count(customer.CustomerID) as Clients from rentals
                inner join customer on rentals.CustomerID = customer.CustomerID
                WHERE RentalDate BETWEEN '2020-12-01' AND '2020-12-31'";

                $result = mysqli_query($conn, $sql);
                $resultcheck = mysqli_num_rows($result);
                if($resultcheck > 0){
                  if($row = mysqli_fetch_assoc($result)){
                    echo "['".'DEC'."', ".$row['Clients']."],";
                  }
                }
            ?>
        ]);

        var options = {
          title: 'Monthly Client Report',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 100%; height: 300px"></div>
  </body>
</html>
