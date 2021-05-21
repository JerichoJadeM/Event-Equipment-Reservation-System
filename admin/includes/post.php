<?php
                           include_once("config.admin.php");
                               if(isset($_POST['postsubmit'])){

                                                    $ItemName = $_POST['ItemName'];
                                                    $Quantity = $_POST['Quantity'];
                                                    $Price = $_POST['Price'];
                                                    $Desc = $_POST['Description'];
                                                    $category = $_POST['category'];

                                                    $sql = "INSERT INTO items (ItemName, category, Quantity, Price, Description) VALUES ('$ItemName', '$category', '$Quantity', '$Price', '$Desc')";
                                                    $result =mysqli_query($conn, $sql);

                                                    if($result){
                                                      echo "<h3 class = 'text-success'> New Item Added Succesfully!";
                                                    }
                                                    mysqli_close($conn);
                               }
                         ?>   