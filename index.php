<?php

include 'db_config.php';

// mysql select query
$stmt = $con->prepare('SELECT * FROM menu');
$stmt->execute();
$menus = $stmt->fetchAll();

//get all item in sale table
$getSales = [];
$getAll = $con->prepare('SELECT * FROM sales');
$getAll->execute();
$getSales = $getAll->fetchAll(PDO::FETCH_ASSOC);
//print_r($getSales);
?>

<!DOCTYPE html>
<html>

<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    // <!-- generate random invoice num -->

        $invoice_num = Rand(1, 1000);
    ?>
    </br></br></br>
    <div class="well container">
        <h1>How to Auto Calculate Price in Javascript</h1>
        <div class="row">
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
            </div>
            <form name="frm-pin" id="my-form" method="post" action="pin-index-a.php">
                <div class="form-group">
                    <div class="col-md-4">
                        <label class="w3-text-green"><b>Number Of Pin</b></label>
                        <select class="form-control" name="tot_pin_requested" id="menu" required>
                            <option value="" disabled selected>Choose your option</option>
                            <!-- loop record -->
                            <?php
                            foreach ($menus as $menu) {
                                echo "<option value=\"" . htmlentities($menu['name']) . "\" id=\"" . htmlentities($menu['cost']) . "\">" . $menu['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label><b>Total Amount</b></label>
                        <input class="form-control" name="tot_amount" id="tot_amount" type="text" value="" readonly>
                    </div>
                    <div class="col-md-4">
                        <label><b>Quantity</b></label>
                        <input class="form-control" name="quantity" id="quantity" type="number" value="">
                    </div>
                    <input class="form-control" type="hidden" id="invoice_num" value="<?php echo $invoice_num ?>" name="invoice_num">
                </div>
                <div class="col-md-6 text-right pull-right" style="padding-top: 10px;">
                    <button type="button" id="next" class="btn btn-danger">Next customer</button>
                    <button type="button" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="well col-md-12">
                <h1>Display Menu</h1>
                <hr />
                <span>Invoice Num : <?php echo $invoice_num ?></span>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($getSales as $sales) {
                                echo "<pre>";
                                print_r($getSales);
                                echo "</pre>";
                                echo '<tr>';
                                echo "<td class='text-center'>" . $sales['id'] . "</td>";
                                echo "<td class='col-md-'>" . $sales['item'] . "</td>";
                                echo "<td class='col-md-1' style='text-align: center'>" . $sales['quantity'] . "</td>";
                                echo "<td class='col-md-1 text-center' id='price' value=''>" . $sales['cost'] . "</td>";
                                echo "<td class='col-md-1 text-center'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></td>";
                                echo '</tr>';
                            }
                            ?>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td class="text-right">
                                    <h4><strong>Total: </strong></h4>
                                </td>
                                <td class="text-center text-danger">
                                    <h4><strong>$31.53</strong></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-success btn-lg btn-block">
                        Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                    </button></td>
                </div>
            </div>
        </div>
        <script>
            var getPrice;
            $("#menu").change(function() {
                getPrice = $("#menu :selected").attr('id');
                // alert(getPrice);
                $("#tot_amount").val("RM " + getPrice);
                $("#price").text("RM " + getPrice);
            });

            jQuery(document).ready(function($) {
                $("#random").click(function() {
                    var number = 1 + Math.floor(Math.random() * 6); //Change the 6 to be the number of random numbers you want to generate. So if you want 100 numbers, change to 100
                    $("#number").text(number);

                });
            });

            $("#next").change(function() {
                alert('kau saba jap')
            });

            $(document).ready(function() {
                $('#submit').on('click', function() {
                    $("#submit").attr("disabled", "disabled");
                    var menu = $('#menu').val();
                    var tot_amount = $('#tot_amount').val();
                    var quantity = $('#quantity').val();
                    var invoice_num = $('#invoice_num').val();
                    if (menu != "" && tot_amount != "" && quantity != "" && invoice_num != "") {
                        $.ajax({
                            url: "controller.php",
                            type: "POST",
                            data: {
                                menu: menu,
                                tot_amount: tot_amount,
                                quantity: quantity,
                                invoice_num: invoice_num
                            },
                            cache: false,
                            success: function(dataResult) {
                                var dataResult = JSON.parse(dataResult);
                                if (dataResult.statusCode == 200) {
                                    $("#submit").removeAttr("disabled");
                                    $('#my-form').find('input:text').val('');
                                    $('#quantity').val('');
                                    $("#success").show();
                                    $('#success').html('Data added successfully !');
                                } else if (dataResult.statusCode == 201) {
                                    alert("Error occured !");
                                }
                            }
                        });
                    } else {
                        alert('Please fill all the field !');
                    }
                });
            });
        </script>
</body>

</html>