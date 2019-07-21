<!DOCTYPE html>
<html lang="en">


<head>
<?php include 'header.php';
?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>

<body>
<?php include 'cart_header .php';?>
<!--  start hero  -->
	<section class="hero">
	 <div class="caption">
<?php
	include 'database.php';
    include 'student_login_session.php';
    $item_total=0;
?>
<style>
	#tbldata {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 50%;
	margin-left:auto; 
    margin-right:auto;
	}
	#tbldata td, #tbldata th {
    border: 0px solid #ddd;
    padding: 13px;
	text-align: CENTER;
}


input[type=submit] {
   background: #B9DFFF;
color: #fff;
border: 1px solid #eee;
border-radius: 20px;
box-shadow: 5px 5px 5px #eee;
text-shadow:none;
}
input[type=submit]:hover {
background: #016ABC;
color: #fff;
border: 1px solid #eee;
border-radius: 20px;
box-shadow: 5px 5px 5px #eee;
text-shadow:none;
}

#tbldata th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: CENTER;
    background-color: #000000;
    color: white;
}
</style>
<table id="tbldata"  cellpadding="10" cellspacing="1" align="center">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:right;"><strong>Qty*Price</strong></th>
</tr>	

<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td><strong><?php echo $item["name"]; ?></strong></td>
				<td><?php echo $item["qty"]; ?></td>
                <td><?php echo "₹".$item["price"]; ?></td>
                <td><?php echo "₹".$item["price"]*$item["qty"]; ?></td>
				</tr>
				<?php
        //$item_total += ($item["price"]*$item["qty"]);
		}
		?>
<tr>
<td colspan="4" align=right><strong>Total:</strong> <?php echo "₹".$_SESSION["total_cart_price"]; ?></td>
</tr>
</tbody>
</table>

<form method='post' action="payment_page.php">
    <input type='submit' value='CANCEL ORDER' name='cancel'>
   
</form>	


<br><br><b>Payment Method</b><br><br>

    <div id="paypal-button"></div>

    <script>
        paypal.Button.render({

            env: 'sandbox', // Or 'sandbox',
            client: {
            sandbox: 'Acl6oizAR2rQ56x-TGOgeF4mzBoIFrkgrYpvp5-YXfYT71jI9_Yl-BX-lS47Ex9PXVbbgp4R7lZ03cyK'
             },
            commit: true, // Show a 'Pay Now' button

            style: {
                color: 'gold',
                size: 'small'
            },

            payment: function(data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: <?=$_SESSION["total_cart_price"];?>, currency: 'INR' }
                            }
                        ]
                    }
                });
            },

            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function(payment) {
                    window.location = "payment_page.php";
                    
                                    // The payment is complete!
                                    // You can now show a confirmation message to the customer
                                });
            },

            onCancel: function(data, actions) {
                /* 
                 * Buyer cancelled the payment 
                 */
            },

            onError: function(err) {
                /* 
                 * An error occurred during the transaction 
                 */
            }

        }, '#paypal-button');
    </script>
	</div>
	</section>
	<?php include 'footer.php';?>
</body>