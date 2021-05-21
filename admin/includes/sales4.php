<?php
include("config.admin.php");

$sql = "SELECT sum(SalePerShip) as total from sales
where SDate BETWEEN '2020-04-01' AND '2020-04-30'";
$result = mysqli_query($conn, $sql);
if($row = mysqli_fetch_assoc($result)){
    
    echo $row['total'];
    
}
?>