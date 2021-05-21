<?php
include("config.admin.php");

$sql = "SELECT sum(SalePerShip) as total from sales
where SDate BETWEEN '2020-12-01' AND '2020-12-31'
ORDER BY RentNo;";
$result = mysqli_query($conn, $sql);
if($row = mysqli_fetch_assoc($result)){
 
    echo $row['total'];
    
}
?>