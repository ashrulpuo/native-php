<?php
session_start();
include 'db_config.php';

// mysql select query
$stmt = $con->prepare('SELECT * FROM menu');
$stmt->execute();
$menus = $stmt->fetchAll();

//get session value
$currentSession = $_SESSION["invoice"];

//get all item in sale table
$getAll = $con->prepare('SELECT * FROM sales WHERE invoice_num =' . $currentSession);
$getAll->execute();
$getSales = $getAll->fetchAll(PDO::FETCH_ASSOC);
//print_r($getSales);
                            foreach ($getSales as $sales) {
                                // echo "<pre>";
                                // print_r($getSales);
                                // echo "</pre>";
                                // echo '<tr>';
                                echo "<td class='text-center'>" . $sales['id'] . "</td>";
                                echo "<td class='col-md-'>" . $sales['item'] . "</td>";
                                echo "<td class='col-md-1' style='text-align: center'>" . $sales['quantity'] . "</td>";
                                echo "<td class='col-md-1 text-center' id='price' value=''>" . $sales['cost'] . "</td>";
                                echo "<td class='col-md-1 text-center'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></td>";
                                echo '</tr>';
                            }
?>