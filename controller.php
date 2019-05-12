<?php
    //include 'db_config.php';
    $servername = "mariadb";
	$username = "root";
	$password = "";
	$db="test_ajwad";
    $conn = mysqli_connect($servername, $username, $password,$db);
    
	$menu=$_POST['menu'];
	$tot_amount=$_POST['tot_amount'];
	$quantity=$_POST['quantity'];
    $invoice_num=$_POST['invoice_num'];
    $date = date('Y-m-d H:i:s');
	$sql = "INSERT INTO `sales`( `item`, `cost`, `quantity`, `invoice_num`, `date`) 
	VALUES ('$menu','$tot_amount','$quantity','$invoice_num', '$date')";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
    mysqli_close($conn);
?>