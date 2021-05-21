<?php
include("config.admin.php");
                        $Sql = "SELECT count(CustomerID) FROM customer;";
                        $result = mysqli_query($conn, $Sql);

                            if(mysqli_num_rows($result) > 0){
                              if($row = mysqli_fetch_assoc($result)){
                                echo  $row['count(CustomerID)'];
                              }
                            }
                    ?>


