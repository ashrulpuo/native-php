<?php
    //include 'db_config.php';
    $servername = "mariadb";
	$username = "root";
	$password = "";
	$db="test_ajwad";
    $conn = mysqli_connect($servername, $username, $password,$db);
    
    $numInvoice=$_POST['numInvoice'];
	$priceCheckout=$_POST['priceCheckout'];
    $custMoney=$_POST['custMoney'];
    $Balance=$_POST['Balance'];
    $date = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO `checkout`( `invoice_num`, `total_amount`, `date`, `cust_money`, `cust_balance`) 
	VALUES ('$numInvoice','$priceCheckout','$date',$custMoney,$Balance)";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	}   
	else {
		echo json_encode(array("statusCode"=>201));
	}
    mysqli_close($conn);
?>