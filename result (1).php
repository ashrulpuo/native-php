<?php

$dsn = 'mysql:host=localhost;dbname=bengkel1';
$username = 'root';
$password = '';

try {
    // connect to mysql
    $con = new PDO($dsn, $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    echo 'Not Connected ' . $ex->getMessage();
}
// mysql select query
$stmt = $con->prepare('SELECT * FROM menu');
$stmt->execute();
$menus = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<body>
    <h1>Calculate Menu</h1>
    <form name="frm-pin" method="post" action="pin-index-a.php">
        <input type="hidden" name="mode" value="PinRequest" />
        <label class="w3-text-green"><b>Menu</b></label>
        <select name="tot_pin_requested" id="menu" onchange="calculateAmount(this.value)" required>
            <option value="" disabled selected>Choose your option</option>
            <!-- loop record -->
            <?php
            foreach ($menus as $menu) {
                echo '<option value=$menu[\'cost\']>' . $menu['name'] . '</option>';
            }
            ?>
        </select>
        <label><b>Price</b></label>
        <input class="w3-input w3-border" name="tot_amount" id="tot_amount" type="text" readonly>
        <input type="submit" name="submit" value="ADD" >

    </form>
    <h1>Display Menu</h1>
    <div  class="container"  style="padding-top:22px" method="post">
        <div class="row col-md-6 col-md-offset-2 custyle">
        <table id="table" class="table table-striped custab">
          <thead>
           <tr bgcolor="#F0F8FF">
                     <th>Id</th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>Action</th>
                     <th>Price</th>          
           </tr>
           <tr bgcolor="#F0F8FF">
                     <th></th>
                     <th></th>
                     <th></th>
                     <th>Total Price</th>
                     <th></th>          
           </tr>

           </thead>
       </table>
   </div>
   <input type="submit" name="submit" value="Submit" >
</div>









    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $("#menu").change(function() {
            alert($("#menu :selected").attr('value'))
        });
    </script>
    <script>
            function calculateAmount(val) {
                var tot_price = val;
                /*display the result*/
                var divobj = document.getElementById('tot_amount');
                divobj.value = tot_price;
            }
        </script>
</body>

</html>