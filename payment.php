<?php

$dsn = 'mysql:host=localhost;dbname=bengkel1';
$username = 'root';
$password = '';

?>

<!DOCTYPE html>
<html>

<body>
    <h1>Confirm Payment</h1>
    <h3>List Menu</h3>
    <form name="frm-pin" method="post" action="pin-index-a.php">
        <div  class="container"  style="padding-top:22px" method="post">
        <div class="row col-md-6 col-md-offset-2 custyle">
        <table id="table" class="table table-striped custab">
          <thead>
           <tr bgcolor="#F0F8FF">
                     <th>Id</th>
                     <th>Name</th>
                     <th>Quantity</th>
                     <th>Price</th>          
           </tr>
           <tr bgcolor="#F0F8FF">
                     <th></th>
                     <th></th>
                     <th>Total price</th>
                     <th></th>
                     <th></th>          
           </tr>
           <tr bgcolor="#F0F8FF">
                     <th></th>
                     <th></th>
                     <th>Amount Pay</th>
                     <th></th>
                     <th></th>          
           </tr>
               <tr bgcolor="#F0F8FF">
                     <th></th>
                     <th></th>
                     <th>Balance</th>
                     <th></th>
                     <th></th>          
           </tr>

           </thead>
       </table>
   </div>
   <input type="submit" name="submit" value="Submit" >
   <a href=""><input type="button"  name="back" value="Back" >
</div>
</body>

</html>