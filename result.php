<?php

$conn = mysqli_connect("localhost","root","");
     if(!$conn){
           die("Database Connection failed".mysqli_error());
}else{
$db_select = mysqli_select_db($conn,"bengkel1");
     if(!$db_select){
           die("Database selection failed".mysql_error());
}else{ 

   } 
}
//$ReadSql="SELECT * FROM team";
//$res = mysqli_query($conn, $sql);

$ReadSql="SELECT * FROM menu";
$res = mysqli_query($conn, $ReadSql);
$rows = mysqli_fetch_assoc($res);
 

?>
<!DOCTYPE html>
<html>
<body>
    <h1>How to Auto Calculate Price in Javascript</h1>
    <form name="frm-pin" method="post" action="pin-index-a.php">
        <input type="hidden" name="mode" value="PinRequest" />
        <label class="w3-text-green"><b>Number Of Pin</b></label>
        <select name="tot_pin_requested" onchange="calculateAmount(this.value)" required>
			<?php
                $rows = array();
                while ($row = mysql_fetch_assoc($res)) {
                 $rows[] = $row;
                }

                foreach ($rows as $row) {
                 print_r($rows);
 

                }
            ?>
            <option value="" disabled selected>Choose your option</option>
			<option value="1">1</option>
	
		</select>
        <label><b>Total Amount</b></label>
        <input class="w3-input w3-border" name="tot_amount" id="tot_amount" type="text" readonly>
        <script>
            function calculateAmount(val) {
                var tot_price = val * 100;
                /*display the result*/
                var divobj = document.getElementById('tot_amount');
                divobj.value = tot_price;
            }
        </script>
        <body>
</html>